<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::query()->insert([
            [
                'title' => 'read-self-post',
                'label' => 'مشاهده پست خود کاربر'
            ],
            [
                'title' => 'update-self-post',
                'label' => 'ویرایش پست خود کاربر'
            ],
            [
                'title' => 'delete-self-post',
                'label' => 'حذف پست خود کاربر'
            ],
            //دسترسی مربوط به بخش پست
            [
                'title' => 'read-post',
                'label' => 'مشاهده پست'
            ],
            [
                'title' => 'create-post',
                'label' => 'ایجاد پست'
            ],
            [
                'title' => 'update-post',
                'label' => 'ویرایش پست'
            ],
            [
                'title' => 'delete-post',
                'label' => 'حذف پست'
            ],

            //دسترسی مربوط به بخش دسته بندی
            [
                'title' => 'read-category',
                'label' => 'مشاهده دسته بندی'
            ],
            [
                'title' => 'create-category',
                'label' => 'ایجاد دسته بندی'
            ],
            [
                'title' => 'update-category',
                'label' => 'ویرایش دسته بندی'
            ],
            [
                'title' => 'delete-category',
                'label' => 'حذف دسته بندی'
            ],

            //دسترسی مربوط به بخش کاربران
            [
                'title' => 'read-user',
                'label' => 'مشاهده کاربر'
            ],
            [
                'title' => 'create-user',
                'label' => 'ایجاد کاربر'
            ],
            [
                'title' => 'update-user',
                'label' => 'ویرایش کاربر'
            ],
            [
                'title' => 'delete-user',
                'label' => 'حذف کاربر'
            ],

            //دسترسی مربوط به بخش نقش ها
            [
                'title' => 'read-role',
                'label' => 'مشاهده نقش'
            ],
            [
                'title' => 'create-role',
                'label' => 'ایجاد نقش'
            ],
            [
                'title' => 'update-role',
                'label' => 'ویرایش نقش'
            ],
            [
                'title' => 'delete-role',
                'label' => 'حذف نقش'
            ],

            //دسترسی مربوط به بخش گالری
            [
                'title' => 'read-gallery',
                'label' => 'مشاهده گالری'
            ],
            [
                'title' => 'create-gallery',
                'label' => 'ایجاد گالری'
            ],
            [
                'title' => 'update-gallery',
                'label' => 'ویرایش گالری'
            ],
            [
                'title' => 'delete-gallery',
                'label' => 'حذف گالری'
            ],

            //دسترسی مربوط به بخش عکس ها در گالری
            [
                'title' => 'read-picture',
                'label' => 'مشاهده عکس در گالری'
            ],
            [
                'title' => 'create-picture',
                'label' => 'ایجاد عکس در گالری'
            ],
            [
                'title' => 'update-picture',
                'label' => 'ویرایش عکس در گالری'
            ],
            [
                'title' => 'delete-picture',
                'label' => 'حذف عکس در گالری'
            ],

            //دسترسی مربوط به بخش پشتیبانی
            [
                'title' => 'read-support',
                'label' => 'مشاهده پشتیبانی'
            ],
            [
                'title' => 'create-support',
                'label' => 'ایجاد درخواست پشتیبانی'
            ],
            [
                'title' => 'reply-support',
                'label' => 'پاسخ پشتیبانی'
            ],
            [
                'title' => 'delete-support',
                'label' => 'حذف درخواست پشتیبانی'
            ],

            //دسترسی مربوط به بخش نظرات
            [
                'title' => 'read-comment',
                'label' => 'مشاهده نظر'
            ],
            [
                'title' => 'reply-comment',
                'label' => 'پاسخ به نظر'
            ],
            [
                'title' => 'delete-comment',
                'label' => 'حذف نظر'
            ],

            //دسترسی مربوط به پنل کاربری
            [
                'title' => 'read-self-comment',
                'label' => 'مشاهده نظر پست خود کاربر'
            ],
            [
                'title' => 'reply-self-comment',
                'label' => 'پاسخ به نظر پست خود کاربر'
            ],
            [
                'title' => 'delete-self-comment',
                'label' => 'حذف نظر پست خود کاربر'
            ],

            //دسترسی مربوط به پنل کاربری
            [
                'title' => 'view-client-dashboard',
                'label' => 'پنل کاربری'
            ]
        ]);
    }
}
