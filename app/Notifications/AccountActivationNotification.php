<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AccountActivationNotification extends Notification
{
    use Queueable;

    public function __construct(
        public string $token,
    ) {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $url = route(
            'account.activation.show',
            [
                'token' => $this->token,
                'email' => $notifiable->email,
            ]
        );

        return (new MailMessage)
            ->from(
                'mail@sowlfa.online',
                'SOWLFA'
            )
            ->subject(
                'تم إنشاء حسابك في SOWLFA'
            )
            ->greeting(
                'مرحبًا ' . $notifiable->name . '،'
            )
            ->line(
                'تم إنشاء حسابك في منصة SOWLFA بنجاح.'
            )
            ->line(
                'البريد الإلكتروني: ' . $notifiable->email
            )
            ->line(
                'لإكمال تفعيل حسابك، يرجى الضغط على الزر التالي وإنشاء كلمة المرور الخاصة بك.'
            )
            ->action(
                'تفعيل الحساب وإنشاء كلمة المرور',
                $url
            )
            ->line(
                'بعد إكمال هذه الخطوة يمكنك تسجيل الدخول إلى حسابك واستخدام المنصة.'
            )
            ->salutation(
                'فريق SOWLFA'
            );
    }
}