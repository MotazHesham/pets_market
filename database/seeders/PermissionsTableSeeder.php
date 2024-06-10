<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 18,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 19,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 20,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 21,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 22,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 23,
                'title' => 'general_setting_access',
            ],
            [
                'id'    => 24,
                'title' => 'slider_create',
            ],
            [
                'id'    => 25,
                'title' => 'slider_edit',
            ],
            [
                'id'    => 26,
                'title' => 'slider_show',
            ],
            [
                'id'    => 27,
                'title' => 'slider_delete',
            ],
            [
                'id'    => 28,
                'title' => 'slider_access',
            ],
            [
                'id'    => 29,
                'title' => 'setting_create',
            ],
            [
                'id'    => 30,
                'title' => 'setting_edit',
            ],
            [
                'id'    => 31,
                'title' => 'setting_show',
            ],
            [
                'id'    => 32,
                'title' => 'setting_delete',
            ],
            [
                'id'    => 33,
                'title' => 'setting_access',
            ],
            [
                'id'    => 34,
                'title' => 'subscription_create',
            ],
            [
                'id'    => 35,
                'title' => 'subscription_edit',
            ],
            [
                'id'    => 36,
                'title' => 'subscription_show',
            ],
            [
                'id'    => 37,
                'title' => 'subscription_delete',
            ],
            [
                'id'    => 38,
                'title' => 'subscription_access',
            ],
            [
                'id'    => 39,
                'title' => 'store_managment_access',
            ],
            [
                'id'    => 40,
                'title' => 'store_create',
            ],
            [
                'id'    => 41,
                'title' => 'store_edit',
            ],
            [
                'id'    => 42,
                'title' => 'store_show',
            ],
            [
                'id'    => 43,
                'title' => 'store_delete',
            ],
            [
                'id'    => 44,
                'title' => 'store_access',
            ],
            [
                'id'    => 45,
                'title' => 'category_create',
            ],
            [
                'id'    => 46,
                'title' => 'category_edit',
            ],
            [
                'id'    => 47,
                'title' => 'category_show',
            ],
            [
                'id'    => 48,
                'title' => 'category_delete',
            ],
            [
                'id'    => 49,
                'title' => 'category_access',
            ],
            [
                'id'    => 50,
                'title' => 'product_create',
            ],
            [
                'id'    => 51,
                'title' => 'product_edit',
            ],
            [
                'id'    => 52,
                'title' => 'product_show',
            ],
            [
                'id'    => 53,
                'title' => 'product_delete',
            ],
            [
                'id'    => 54,
                'title' => 'product_access',
            ],
            [
                'id'    => 55,
                'title' => 'order_create',
            ],
            [
                'id'    => 56,
                'title' => 'order_edit',
            ],
            [
                'id'    => 57,
                'title' => 'order_show',
            ],
            [
                'id'    => 58,
                'title' => 'order_delete',
            ],
            [
                'id'    => 59,
                'title' => 'order_access',
            ],
            [
                'id'    => 60,
                'title' => 'country_create',
            ],
            [
                'id'    => 61,
                'title' => 'country_edit',
            ],
            [
                'id'    => 62,
                'title' => 'country_show',
            ],
            [
                'id'    => 63,
                'title' => 'country_delete',
            ],
            [
                'id'    => 64,
                'title' => 'country_access',
            ],
            [
                'id'    => 65,
                'title' => 'order_detail_create',
            ],
            [
                'id'    => 66,
                'title' => 'order_detail_edit',
            ],
            [
                'id'    => 67,
                'title' => 'order_detail_show',
            ],
            [
                'id'    => 68,
                'title' => 'order_detail_delete',
            ],
            [
                'id'    => 69,
                'title' => 'order_detail_access',
            ],
            [
                'id'    => 70,
                'title' => 'brand_create',
            ],
            [
                'id'    => 71,
                'title' => 'brand_edit',
            ],
            [
                'id'    => 72,
                'title' => 'brand_show',
            ],
            [
                'id'    => 73,
                'title' => 'brand_delete',
            ],
            [
                'id'    => 74,
                'title' => 'brand_access',
            ],
            [
                'id'    => 75,
                'title' => 'wishlist_create',
            ],
            [
                'id'    => 76,
                'title' => 'wishlist_edit',
            ],
            [
                'id'    => 77,
                'title' => 'wishlist_show',
            ],
            [
                'id'    => 78,
                'title' => 'wishlist_delete',
            ],
            [
                'id'    => 79,
                'title' => 'wishlist_access',
            ],
            [
                'id'    => 80,
                'title' => 'clinic_managment_access',
            ],
            [
                'id'    => 81,
                'title' => 'clinic_create',
            ],
            [
                'id'    => 82,
                'title' => 'clinic_edit',
            ],
            [
                'id'    => 83,
                'title' => 'clinic_show',
            ],
            [
                'id'    => 84,
                'title' => 'clinic_delete',
            ],
            [
                'id'    => 85,
                'title' => 'clinic_access',
            ],
            [
                'id'    => 86,
                'title' => 'clinic_service_create',
            ],
            [
                'id'    => 87,
                'title' => 'clinic_service_edit',
            ],
            [
                'id'    => 88,
                'title' => 'clinic_service_show',
            ],
            [
                'id'    => 89,
                'title' => 'clinic_service_delete',
            ],
            [
                'id'    => 90,
                'title' => 'clinic_service_access',
            ],
            [
                'id'    => 91,
                'title' => 'clinic_appointment_create',
            ],
            [
                'id'    => 92,
                'title' => 'clinic_appointment_edit',
            ],
            [
                'id'    => 93,
                'title' => 'clinic_appointment_show',
            ],
            [
                'id'    => 94,
                'title' => 'clinic_appointment_delete',
            ],
            [
                'id'    => 95,
                'title' => 'clinic_appointment_access',
            ],
            [
                'id'    => 96,
                'title' => 'rescue_case_create',
            ],
            [
                'id'    => 97,
                'title' => 'rescue_case_edit',
            ],
            [
                'id'    => 98,
                'title' => 'rescue_case_show',
            ],
            [
                'id'    => 99,
                'title' => 'rescue_case_delete',
            ],
            [
                'id'    => 100,
                'title' => 'rescue_case_access',
            ],
            [
                'id'    => 101,
                'title' => 'pet_type_create',
            ],
            [
                'id'    => 102,
                'title' => 'pet_type_edit',
            ],
            [
                'id'    => 103,
                'title' => 'pet_type_show',
            ],
            [
                'id'    => 104,
                'title' => 'pet_type_delete',
            ],
            [
                'id'    => 105,
                'title' => 'pet_type_access',
            ],
            [
                'id'    => 106,
                'title' => 'adoption_managment_access',
            ],
            [
                'id'    => 107,
                'title' => 'missing_pet_create',
            ],
            [
                'id'    => 108,
                'title' => 'missing_pet_edit',
            ],
            [
                'id'    => 109,
                'title' => 'missing_pet_show',
            ],
            [
                'id'    => 110,
                'title' => 'missing_pet_delete',
            ],
            [
                'id'    => 111,
                'title' => 'missing_pet_access',
            ],
            [
                'id'    => 112,
                'title' => 'delivery_pet_create',
            ],
            [
                'id'    => 113,
                'title' => 'delivery_pet_edit',
            ],
            [
                'id'    => 114,
                'title' => 'delivery_pet_show',
            ],
            [
                'id'    => 115,
                'title' => 'delivery_pet_delete',
            ],
            [
                'id'    => 116,
                'title' => 'delivery_pet_access',
            ],
            [
                'id'    => 117,
                'title' => 'refuge_create',
            ],
            [
                'id'    => 118,
                'title' => 'refuge_edit',
            ],
            [
                'id'    => 119,
                'title' => 'refuge_show',
            ],
            [
                'id'    => 120,
                'title' => 'refuge_delete',
            ],
            [
                'id'    => 121,
                'title' => 'refuge_access',
            ],
            [
                'id'    => 122,
                'title' => 'refuge_pet_create',
            ],
            [
                'id'    => 123,
                'title' => 'refuge_pet_edit',
            ],
            [
                'id'    => 124,
                'title' => 'refuge_pet_show',
            ],
            [
                'id'    => 125,
                'title' => 'refuge_pet_delete',
            ],
            [
                'id'    => 126,
                'title' => 'refuge_pet_access',
            ],
            [
                'id'    => 127,
                'title' => 'adoption_request_create',
            ],
            [
                'id'    => 128,
                'title' => 'adoption_request_edit',
            ],
            [
                'id'    => 129,
                'title' => 'adoption_request_show',
            ],
            [
                'id'    => 130,
                'title' => 'adoption_request_delete',
            ],
            [
                'id'    => 131,
                'title' => 'adoption_request_access',
            ],
            [
                'id'    => 132,
                'title' => 'contactu_delete',
            ],
            [
                'id'    => 133,
                'title' => 'contactu_access',
            ],
            [
                'id'    => 134,
                'title' => 'user_pet_create',
            ],
            [
                'id'    => 135,
                'title' => 'user_pet_edit',
            ],
            [
                'id'    => 136,
                'title' => 'user_pet_show',
            ],
            [
                'id'    => 137,
                'title' => 'user_pet_delete',
            ],
            [
                'id'    => 138,
                'title' => 'user_pet_access',
            ],
            [
                'id'    => 139,
                'title' => 'client_managment_access',
            ],
            [
                'id'    => 140,
                'title' => 'customer_create',
            ],
            [
                'id'    => 141,
                'title' => 'customer_edit',
            ],
            [
                'id'    => 142,
                'title' => 'customer_show',
            ],
            [
                'id'    => 143,
                'title' => 'customer_delete',
            ],
            [
                'id'    => 144,
                'title' => 'customer_access',
            ],
            [
                'id'    => 145,
                'title' => 'post_create',
            ],
            [
                'id'    => 146,
                'title' => 'post_edit',
            ],
            [
                'id'    => 147,
                'title' => 'post_show',
            ],
            [
                'id'    => 148,
                'title' => 'post_delete',
            ],
            [
                'id'    => 149,
                'title' => 'post_access',
            ],
            [
                'id'    => 150,
                'title' => 'post_managment_access',
            ],
            [
                'id'    => 151,
                'title' => 'comment_create',
            ],
            [
                'id'    => 152,
                'title' => 'comment_edit',
            ],
            [
                'id'    => 153,
                'title' => 'comment_show',
            ],
            [
                'id'    => 154,
                'title' => 'comment_delete',
            ],
            [
                'id'    => 155,
                'title' => 'comment_access',
            ],
            [
                'id'    => 156,
                'title' => 'review_show',
            ],
            [
                'id'    => 157,
                'title' => 'review_delete',
            ],
            [
                'id'    => 158,
                'title' => 'review_access',
            ],
            [
                'id'    => 159,
                'title' => 'product_review_show',
            ],
            [
                'id'    => 160,
                'title' => 'product_review_delete',
            ],
            [
                'id'    => 161,
                'title' => 'product_review_access',
            ],
            [
                'id'    => 162,
                'title' => 'volunteer_create',
            ],
            [
                'id'    => 163,
                'title' => 'volunteer_edit',
            ],
            [
                'id'    => 164,
                'title' => 'volunteer_show',
            ],
            [
                'id'    => 165,
                'title' => 'volunteer_delete',
            ],
            [
                'id'    => 166,
                'title' => 'volunteer_access',
            ],
            [
                'id'    => 167,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
