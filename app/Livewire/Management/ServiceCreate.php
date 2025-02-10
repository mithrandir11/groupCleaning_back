<?php

namespace App\Livewire\Management;

use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;

class ServiceCreate extends Component
{
    public $title = '';
    public $title_fa = '';
    public $slug = '';

    public $type = ['title' => '', 'values' => []]; // فقط یک نوع خدمت
    public $options = []; // لیست گزینه‌ها

    protected $rules = [
        'title' => 'required|string|max:100',
        'title_fa' => 'required|string|max:100',
        'slug' => 'required|string|max:100|unique:services,slug',
        'type.title' => 'nullable|string|max:100',
        'type.values.*' => 'nullable|string|max:100', // مقادیر نوع
        'options.*.title' => 'nullable|string|max:100',
        'options.*.is_multiple' => 'boolean',
        'options.*.is_required' => 'boolean',
        'options.*.values.*' => 'nullable|string|max:100', // مقادیر گزینه‌ها
    ];

    public function addOption()
    {
        $this->options[] = ['title' => '', 'is_multiple' => false, 'is_required' => true, 'values' => []];
    }

    public function removeOption($index)
    {
        unset($this->options[$index]);
        $this->options = array_values($this->options); // بازسازی اندیس‌ها
    }

    public function addTypeValue()
    {
        $this->type['values'][] = ''; // اضافه کردن مقدار جدید به نوع خدمت
    }

    public function removeTypeValue($index)
    {
        unset($this->type['values'][$index]);
        $this->type['values'] = array_values($this->type['values']); // بازسازی اندیس‌ها
    }

    public function addOptionValue($optionIndex)
    {
        $this->options[$optionIndex]['values'][] = ''; // اضافه کردن مقدار جدید به گزینه
    }

    public function removeOptionValue($optionIndex, $valueIndex)
    {
        unset($this->options[$optionIndex]['values'][$valueIndex]);
        $this->options[$optionIndex]['values'] = array_values($this->options[$optionIndex]['values']); // بازسازی اندیس‌ها
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    public function saveService()
    {
        // dd($this->type, $this->options);
        $this->validate();

        // ذخیره خدمت

        DB::beginTransaction();
        $service = Service::create([
            'title' => $this->title,
            'title_fa' => $this->title_fa,
            'slug' => $this->slug,
        ]);

        // ذخیره نوع خدمت و مقادیر آن
        if (!empty($this->type['title'])) {
            $type = $service->type()->create(['title' => $this->type['title']]);
            foreach ($this->type['values'] as $value) {
                if (!empty($value)) {
                    $type->values()->create(['title' => $value]);
                }
            }
        }

        // ذخیره گزینه‌ها و مقادیر آن‌ها
        foreach ($this->options as $optionData) {
            if (!empty($optionData['title'])) {
                $option = $service->options()->create([
                    'title' => $optionData['title'],
                    'is_multiple' => $optionData['is_multiple'],
                    'is_required' => $optionData['is_required'],
                ]);
                foreach ($optionData['values'] as $value) {
                    if (!empty($value)) {
                        $option->values()->create(['title' => $value]);
                    }
                }
            }
        }

        DB::commit();

        session()->flash('success', 'خدمت با موفقیت ایجاد شد.');
        return redirect()->route('admin.services');
    }




    public function render()
    {
        return view('livewire.management.service-create');
    }
}
