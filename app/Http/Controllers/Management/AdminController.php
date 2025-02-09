<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Order;
use App\Models\User;
use App\Services\GhasedakSmsService;
use App\Services\OtpService;
use Artesaos\SEOTools\Facades\SEOMeta;


class AdminController extends Controller
{
    public function dashboard()
    {
        $article = Article::with('seo')->where('id',23)->first();

       
        
        // $order = $this->createOrder($data);

        // $user = User::where('cellphone', '09941831687')->first();
        // $OTPCode = mt_rand(100000, 999999);
        // (new OtpService(new GhasedakSmsService))->sendOtp($user, $OTPCode);
        
        return view('management.dashboard' , compact('article'));
    }
    




    // $data = [
    //     "user_id" => 4,
    //     "service_id" => 1,
    //     "service_type" => "سرویس دوره ای",
    //     "service_options" => [
    //         "نوع فضای مورد نظر" => "مسکونی",
    //         "موارد مشمول نظافت" => ["آشپزخانه", "دیوار شویی"],
    //         "برآورد از زمان مورد نیاز" => "6 ساعت",
    //         "متراژ فضا" => "70 تا 90 متر",
    //         "خدمات تکمیلی" => ["اتوکشی پرده", "باز و نصب کردن پرده"],
    //         "تعداد نیروی موردنیاز" => "2 نفر",
    //         "حیوان خانگی دارید؟" => "خیر"
    //     ],
    //     "extra_details" => "توضیح خاصی نیست",
    //     "selected_date" => "1403/11/22",
    //     "selected_time" => "20:00:00",
    //     "contact_number" => "09390990721",
    //     "address" => "تهران-زعفرانیه-تهران زعفرانیه خیابان مقدس اردبیلی پلاک 160",
    //     "order_code" => "1403118110"
    // ];
    public function createOrder($data)
{
    // ایجاد یک سفارش جدید
    $order = new Order();

    // تنظیم مقادیر پایه
    $order->user_id = $data['user_id'];
    $order->service_id = $data['service_id'];
    $order->service_type = $data['service_type'];
    $order->extra_details = $data['extra_details'];
    $order->selected_date = $data['selected_date'];
    $order->selected_time = $data['selected_time'];
    $order->contact_number = $data['contact_number'];
    $order->address = $data['address'];
    $order->order_code = $data['order_code'];

    // تنظیم service_options به صورت JSON
    $order->service_options = json_encode($data['service_options']);

    // ذخیره سفارش
    $order->save();

    // بازگرداندن سفارش ذخیره شده
    return $order;
}
}
