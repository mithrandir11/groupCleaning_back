<?php

namespace App\Livewire\Management;

use App\Models\Service;
use Livewire\Component;

class ServiceEdit extends Component
{
    public $serviceId;
    public $title = '';
    public $title_fa = '';
    public $slug = '';
    public $type = ['title' => '', 'values' => []];
    public $options = [];

    public function mount($id)
    {
        $this->serviceId = $id;
        $service = Service::with('type', 'type.values', 'options', 'options.values')->find($id);

        $this->title = $service->title;
        $this->title_fa = $service->title_fa;
        $this->slug = $service->slug;

        // تنظیم نوع خدمت
        if ($service->type) {
            $this->type['title'] = $service->type->title;
            $this->type['values'] = $service->type->values->pluck('title')->toArray();
        }

        // تنظیم گزینه‌ها
        foreach ($service->options as $option) {
            $this->options[] = [
                'title' => $option->title,
                'is_multiple' => $option->is_multiple,
                'is_required' => $option->is_required,
                'values' => $option->values->pluck('title')->toArray(),
            ];
        }
    }

    protected $rules = [
        'title' => 'required|string|max:100',
        'title_fa' => 'required|string|max:100',
        'slug' => 'required|string|max:100',
        'type.title' => 'nullable|string|max:100',
        'type.values.*' => 'nullable|string|max:100',
        'options.*.title' => 'nullable|string|max:100',
        'options.*.is_multiple' => 'boolean',
        'options.*.is_required' => 'boolean',
        'options.*.values.*' => 'nullable|string|max:100',
    ];

    public function addOption()
    {
        $this->options[] = ['title' => '', 'is_multiple' => false, 'is_required' => true, 'values' => []];
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options);
    }

    public function addTypeValue()
    {
        $this->type['values'][] = '';
    }

    public function removeTypeValue($index)
    {
        unset($this->type['values'][$index]);
        $this->type['values'] = array_values($this->type['values']);
    }

    public function addOptionValue($optionIndex)
    {
        $this->options[$optionIndex]['values'][] = '';
    }

    public function removeOptionValue($optionIndex, $valueIndex)
    {
        unset($this->options[$optionIndex]['values'][$valueIndex]);
        $this->options[$optionIndex]['values'] = array_values($this->options[$optionIndex]['values']);
    }

    public function updateService()
    {
        $this->validate();

        // به‌روزرسانی خدمت
        $service = \App\Models\Service::find($this->serviceId);
        $service->update([
            'title' => $this->title,
            'title_fa' => $this->title_fa,
            'slug' => $this->slug,
        ]);

        // به‌روزرسانی نوع خدمت
        if ($service->type->isNotEmpty()) {
            $type = $service->type;
            $type->update(['title' => $this->type['title']]);
            $type->values()->delete(); // حذف مقادیر قدیمی
            foreach ($this->type['values'] as $value) {
                if (!empty($value)) {
                    $type->values()->create(['title' => $value]);
                }
            }
        } else {
            if (!empty($this->type['title'])) {
                $type = $service->type()->create(['title' => $this->type['title']]);
                foreach ($this->type['values'] as $value) {
                    if (!empty($value)) {
                        $type->values()->create(['title' => $value]);
                    }
                }
            }
        }

        // به‌روزرسانی گزینه‌ها
        foreach ($this->options as $optionData) {
            if (!empty($optionData['title'])) {
                $option = $service->options()->firstOrCreate(['title' => $optionData['title']]);
                $option->update([
                    'is_multiple' => $optionData['is_multiple'],
                    'is_required' => $optionData['is_required'],
                ]);
                $option->values()->delete(); // حذف مقادیر قدیمی
                foreach ($optionData['values'] as $value) {
                    if (!empty($value)) {
                        $option->values()->create(['title' => $value]);
                    }
                }
            }
        }

        session()->flash('success', 'خدمت با موفقیت به‌روزرسانی شد.');
        return redirect()->route('admin.services.index');
    }
    
    public function render()
    {
        return view('livewire.management.service-edit');
    }
}
