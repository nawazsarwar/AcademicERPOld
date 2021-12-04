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
                'title' => 'asset_management_access',
            ],
            [
                'id'    => 24,
                'title' => 'asset_category_create',
            ],
            [
                'id'    => 25,
                'title' => 'asset_category_edit',
            ],
            [
                'id'    => 26,
                'title' => 'asset_category_show',
            ],
            [
                'id'    => 27,
                'title' => 'asset_category_delete',
            ],
            [
                'id'    => 28,
                'title' => 'asset_category_access',
            ],
            [
                'id'    => 29,
                'title' => 'asset_location_create',
            ],
            [
                'id'    => 30,
                'title' => 'asset_location_edit',
            ],
            [
                'id'    => 31,
                'title' => 'asset_location_show',
            ],
            [
                'id'    => 32,
                'title' => 'asset_location_delete',
            ],
            [
                'id'    => 33,
                'title' => 'asset_location_access',
            ],
            [
                'id'    => 34,
                'title' => 'asset_status_create',
            ],
            [
                'id'    => 35,
                'title' => 'asset_status_edit',
            ],
            [
                'id'    => 36,
                'title' => 'asset_status_show',
            ],
            [
                'id'    => 37,
                'title' => 'asset_status_delete',
            ],
            [
                'id'    => 38,
                'title' => 'asset_status_access',
            ],
            [
                'id'    => 39,
                'title' => 'asset_create',
            ],
            [
                'id'    => 40,
                'title' => 'asset_edit',
            ],
            [
                'id'    => 41,
                'title' => 'asset_show',
            ],
            [
                'id'    => 42,
                'title' => 'asset_delete',
            ],
            [
                'id'    => 43,
                'title' => 'asset_access',
            ],
            [
                'id'    => 44,
                'title' => 'assets_history_access',
            ],
            [
                'id'    => 45,
                'title' => 'campus_create',
            ],
            [
                'id'    => 46,
                'title' => 'campus_edit',
            ],
            [
                'id'    => 47,
                'title' => 'campus_show',
            ],
            [
                'id'    => 48,
                'title' => 'campus_delete',
            ],
            [
                'id'    => 49,
                'title' => 'campus_access',
            ],
            [
                'id'    => 50,
                'title' => 'country_create',
            ],
            [
                'id'    => 51,
                'title' => 'country_edit',
            ],
            [
                'id'    => 52,
                'title' => 'country_show',
            ],
            [
                'id'    => 53,
                'title' => 'country_delete',
            ],
            [
                'id'    => 54,
                'title' => 'country_access',
            ],
            [
                'id'    => 55,
                'title' => 'province_create',
            ],
            [
                'id'    => 56,
                'title' => 'province_edit',
            ],
            [
                'id'    => 57,
                'title' => 'province_show',
            ],
            [
                'id'    => 58,
                'title' => 'province_delete',
            ],
            [
                'id'    => 59,
                'title' => 'province_access',
            ],
            [
                'id'    => 60,
                'title' => 'city_create',
            ],
            [
                'id'    => 61,
                'title' => 'city_edit',
            ],
            [
                'id'    => 62,
                'title' => 'city_show',
            ],
            [
                'id'    => 63,
                'title' => 'city_delete',
            ],
            [
                'id'    => 64,
                'title' => 'city_access',
            ],
            [
                'id'    => 65,
                'title' => 'religion_create',
            ],
            [
                'id'    => 66,
                'title' => 'religion_edit',
            ],
            [
                'id'    => 67,
                'title' => 'religion_show',
            ],
            [
                'id'    => 68,
                'title' => 'religion_delete',
            ],
            [
                'id'    => 69,
                'title' => 'religion_access',
            ],
            [
                'id'    => 70,
                'title' => 'pincode_create',
            ],
            [
                'id'    => 71,
                'title' => 'pincode_edit',
            ],
            [
                'id'    => 72,
                'title' => 'pincode_show',
            ],
            [
                'id'    => 73,
                'title' => 'pincode_delete',
            ],
            [
                'id'    => 74,
                'title' => 'pincode_access',
            ],
            [
                'id'    => 75,
                'title' => 'person_create',
            ],
            [
                'id'    => 76,
                'title' => 'person_edit',
            ],
            [
                'id'    => 77,
                'title' => 'person_show',
            ],
            [
                'id'    => 78,
                'title' => 'person_delete',
            ],
            [
                'id'    => 79,
                'title' => 'person_access',
            ],
            [
                'id'    => 80,
                'title' => 'board_create',
            ],
            [
                'id'    => 81,
                'title' => 'board_edit',
            ],
            [
                'id'    => 82,
                'title' => 'board_show',
            ],
            [
                'id'    => 83,
                'title' => 'board_delete',
            ],
            [
                'id'    => 84,
                'title' => 'board_access',
            ],
            [
                'id'    => 85,
                'title' => 'address_create',
            ],
            [
                'id'    => 86,
                'title' => 'address_edit',
            ],
            [
                'id'    => 87,
                'title' => 'address_show',
            ],
            [
                'id'    => 88,
                'title' => 'address_delete',
            ],
            [
                'id'    => 89,
                'title' => 'address_access',
            ],
            [
                'id'    => 90,
                'title' => 'course_create',
            ],
            [
                'id'    => 91,
                'title' => 'course_edit',
            ],
            [
                'id'    => 92,
                'title' => 'course_show',
            ],
            [
                'id'    => 93,
                'title' => 'course_delete',
            ],
            [
                'id'    => 94,
                'title' => 'course_access',
            ],
            [
                'id'    => 95,
                'title' => 'faculty_create',
            ],
            [
                'id'    => 96,
                'title' => 'faculty_edit',
            ],
            [
                'id'    => 97,
                'title' => 'faculty_show',
            ],
            [
                'id'    => 98,
                'title' => 'faculty_delete',
            ],
            [
                'id'    => 99,
                'title' => 'faculty_access',
            ],
            [
                'id'    => 100,
                'title' => 'degree_create',
            ],
            [
                'id'    => 101,
                'title' => 'degree_edit',
            ],
            [
                'id'    => 102,
                'title' => 'degree_show',
            ],
            [
                'id'    => 103,
                'title' => 'degree_delete',
            ],
            [
                'id'    => 104,
                'title' => 'degree_access',
            ],
            [
                'id'    => 105,
                'title' => 'department_create',
            ],
            [
                'id'    => 106,
                'title' => 'department_edit',
            ],
            [
                'id'    => 107,
                'title' => 'department_show',
            ],
            [
                'id'    => 108,
                'title' => 'department_delete',
            ],
            [
                'id'    => 109,
                'title' => 'department_access',
            ],
            [
                'id'    => 110,
                'title' => 'centre_create',
            ],
            [
                'id'    => 111,
                'title' => 'centre_edit',
            ],
            [
                'id'    => 112,
                'title' => 'centre_show',
            ],
            [
                'id'    => 113,
                'title' => 'centre_delete',
            ],
            [
                'id'    => 114,
                'title' => 'centre_access',
            ],
            [
                'id'    => 115,
                'title' => 'support_centre_access',
            ],
            [
                'id'    => 116,
                'title' => 'status_create',
            ],
            [
                'id'    => 117,
                'title' => 'status_edit',
            ],
            [
                'id'    => 118,
                'title' => 'status_show',
            ],
            [
                'id'    => 119,
                'title' => 'status_delete',
            ],
            [
                'id'    => 120,
                'title' => 'status_access',
            ],
            [
                'id'    => 121,
                'title' => 'priority_create',
            ],
            [
                'id'    => 122,
                'title' => 'priority_edit',
            ],
            [
                'id'    => 123,
                'title' => 'priority_show',
            ],
            [
                'id'    => 124,
                'title' => 'priority_delete',
            ],
            [
                'id'    => 125,
                'title' => 'priority_access',
            ],
            [
                'id'    => 126,
                'title' => 'category_create',
            ],
            [
                'id'    => 127,
                'title' => 'category_edit',
            ],
            [
                'id'    => 128,
                'title' => 'category_show',
            ],
            [
                'id'    => 129,
                'title' => 'category_delete',
            ],
            [
                'id'    => 130,
                'title' => 'category_access',
            ],
            [
                'id'    => 131,
                'title' => 'ticket_create',
            ],
            [
                'id'    => 132,
                'title' => 'ticket_edit',
            ],
            [
                'id'    => 133,
                'title' => 'ticket_show',
            ],
            [
                'id'    => 134,
                'title' => 'ticket_delete',
            ],
            [
                'id'    => 135,
                'title' => 'ticket_access',
            ],
            [
                'id'    => 136,
                'title' => 'comment_create',
            ],
            [
                'id'    => 137,
                'title' => 'comment_edit',
            ],
            [
                'id'    => 138,
                'title' => 'comment_show',
            ],
            [
                'id'    => 139,
                'title' => 'comment_delete',
            ],
            [
                'id'    => 140,
                'title' => 'comment_access',
            ],
            [
                'id'    => 141,
                'title' => 'hall_create',
            ],
            [
                'id'    => 142,
                'title' => 'hall_edit',
            ],
            [
                'id'    => 143,
                'title' => 'hall_show',
            ],
            [
                'id'    => 144,
                'title' => 'hall_delete',
            ],
            [
                'id'    => 145,
                'title' => 'hall_access',
            ],
            [
                'id'    => 146,
                'title' => 'hostel_create',
            ],
            [
                'id'    => 147,
                'title' => 'hostel_edit',
            ],
            [
                'id'    => 148,
                'title' => 'hostel_show',
            ],
            [
                'id'    => 149,
                'title' => 'hostel_delete',
            ],
            [
                'id'    => 150,
                'title' => 'hostel_access',
            ],
            [
                'id'    => 151,
                'title' => 'qualification_create',
            ],
            [
                'id'    => 152,
                'title' => 'qualification_edit',
            ],
            [
                'id'    => 153,
                'title' => 'qualification_show',
            ],
            [
                'id'    => 154,
                'title' => 'qualification_delete',
            ],
            [
                'id'    => 155,
                'title' => 'qualification_access',
            ],
            [
                'id'    => 156,
                'title' => 'qualification_level_create',
            ],
            [
                'id'    => 157,
                'title' => 'qualification_level_edit',
            ],
            [
                'id'    => 158,
                'title' => 'qualification_level_show',
            ],
            [
                'id'    => 159,
                'title' => 'qualification_level_delete',
            ],
            [
                'id'    => 160,
                'title' => 'qualification_level_access',
            ],
            [
                'id'    => 161,
                'title' => 'phone_create',
            ],
            [
                'id'    => 162,
                'title' => 'phone_edit',
            ],
            [
                'id'    => 163,
                'title' => 'phone_show',
            ],
            [
                'id'    => 164,
                'title' => 'phone_delete',
            ],
            [
                'id'    => 165,
                'title' => 'phone_access',
            ],
            [
                'id'    => 166,
                'title' => 'paper_type_create',
            ],
            [
                'id'    => 167,
                'title' => 'paper_type_edit',
            ],
            [
                'id'    => 168,
                'title' => 'paper_type_show',
            ],
            [
                'id'    => 169,
                'title' => 'paper_type_delete',
            ],
            [
                'id'    => 170,
                'title' => 'paper_type_access',
            ],
            [
                'id'    => 171,
                'title' => 'paper_create',
            ],
            [
                'id'    => 172,
                'title' => 'paper_edit',
            ],
            [
                'id'    => 173,
                'title' => 'paper_show',
            ],
            [
                'id'    => 174,
                'title' => 'paper_delete',
            ],
            [
                'id'    => 175,
                'title' => 'paper_access',
            ],
            [
                'id'    => 176,
                'title' => 'enrolment_create',
            ],
            [
                'id'    => 177,
                'title' => 'enrolment_edit',
            ],
            [
                'id'    => 178,
                'title' => 'enrolment_show',
            ],
            [
                'id'    => 179,
                'title' => 'enrolment_delete',
            ],
            [
                'id'    => 180,
                'title' => 'enrolment_access',
            ],
            [
                'id'    => 181,
                'title' => 'student_create',
            ],
            [
                'id'    => 182,
                'title' => 'student_edit',
            ],
            [
                'id'    => 183,
                'title' => 'student_show',
            ],
            [
                'id'    => 184,
                'title' => 'student_delete',
            ],
            [
                'id'    => 185,
                'title' => 'student_access',
            ],
            [
                'id'    => 186,
                'title' => 'employee_create',
            ],
            [
                'id'    => 187,
                'title' => 'employee_edit',
            ],
            [
                'id'    => 188,
                'title' => 'employee_show',
            ],
            [
                'id'    => 189,
                'title' => 'employee_delete',
            ],
            [
                'id'    => 190,
                'title' => 'employee_access',
            ],
            [
                'id'    => 191,
                'title' => 'designation_create',
            ],
            [
                'id'    => 192,
                'title' => 'designation_edit',
            ],
            [
                'id'    => 193,
                'title' => 'designation_show',
            ],
            [
                'id'    => 194,
                'title' => 'designation_delete',
            ],
            [
                'id'    => 195,
                'title' => 'designation_access',
            ],
            [
                'id'    => 196,
                'title' => 'nominee_create',
            ],
            [
                'id'    => 197,
                'title' => 'nominee_edit',
            ],
            [
                'id'    => 198,
                'title' => 'nominee_show',
            ],
            [
                'id'    => 199,
                'title' => 'nominee_delete',
            ],
            [
                'id'    => 200,
                'title' => 'nominee_access',
            ],
            [
                'id'    => 201,
                'title' => 'family_member_create',
            ],
            [
                'id'    => 202,
                'title' => 'family_member_edit',
            ],
            [
                'id'    => 203,
                'title' => 'family_member_show',
            ],
            [
                'id'    => 204,
                'title' => 'family_member_delete',
            ],
            [
                'id'    => 205,
                'title' => 'family_member_access',
            ],
            [
                'id'    => 206,
                'title' => 'controllers_office_access',
            ],
            [
                'id'    => 207,
                'title' => 'dean_students_welfare_access',
            ],
            [
                'id'    => 208,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
