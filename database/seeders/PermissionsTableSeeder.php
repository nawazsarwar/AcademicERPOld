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
                'title' => 'province_create',
            ],
            [
                'id'    => 51,
                'title' => 'province_edit',
            ],
            [
                'id'    => 52,
                'title' => 'province_show',
            ],
            [
                'id'    => 53,
                'title' => 'province_delete',
            ],
            [
                'id'    => 54,
                'title' => 'province_access',
            ],
            [
                'id'    => 55,
                'title' => 'city_create',
            ],
            [
                'id'    => 56,
                'title' => 'city_edit',
            ],
            [
                'id'    => 57,
                'title' => 'city_show',
            ],
            [
                'id'    => 58,
                'title' => 'city_delete',
            ],
            [
                'id'    => 59,
                'title' => 'city_access',
            ],
            [
                'id'    => 60,
                'title' => 'religion_create',
            ],
            [
                'id'    => 61,
                'title' => 'religion_edit',
            ],
            [
                'id'    => 62,
                'title' => 'religion_show',
            ],
            [
                'id'    => 63,
                'title' => 'religion_delete',
            ],
            [
                'id'    => 64,
                'title' => 'religion_access',
            ],
            [
                'id'    => 65,
                'title' => 'person_create',
            ],
            [
                'id'    => 66,
                'title' => 'person_edit',
            ],
            [
                'id'    => 67,
                'title' => 'person_show',
            ],
            [
                'id'    => 68,
                'title' => 'person_delete',
            ],
            [
                'id'    => 69,
                'title' => 'person_access',
            ],
            [
                'id'    => 70,
                'title' => 'board_create',
            ],
            [
                'id'    => 71,
                'title' => 'board_edit',
            ],
            [
                'id'    => 72,
                'title' => 'board_show',
            ],
            [
                'id'    => 73,
                'title' => 'board_delete',
            ],
            [
                'id'    => 74,
                'title' => 'board_access',
            ],
            [
                'id'    => 75,
                'title' => 'address_create',
            ],
            [
                'id'    => 76,
                'title' => 'address_edit',
            ],
            [
                'id'    => 77,
                'title' => 'address_show',
            ],
            [
                'id'    => 78,
                'title' => 'address_delete',
            ],
            [
                'id'    => 79,
                'title' => 'address_access',
            ],
            [
                'id'    => 80,
                'title' => 'course_create',
            ],
            [
                'id'    => 81,
                'title' => 'course_edit',
            ],
            [
                'id'    => 82,
                'title' => 'course_show',
            ],
            [
                'id'    => 83,
                'title' => 'course_delete',
            ],
            [
                'id'    => 84,
                'title' => 'course_access',
            ],
            [
                'id'    => 85,
                'title' => 'faculty_create',
            ],
            [
                'id'    => 86,
                'title' => 'faculty_edit',
            ],
            [
                'id'    => 87,
                'title' => 'faculty_show',
            ],
            [
                'id'    => 88,
                'title' => 'faculty_delete',
            ],
            [
                'id'    => 89,
                'title' => 'faculty_access',
            ],
            [
                'id'    => 90,
                'title' => 'degree_create',
            ],
            [
                'id'    => 91,
                'title' => 'degree_edit',
            ],
            [
                'id'    => 92,
                'title' => 'degree_show',
            ],
            [
                'id'    => 93,
                'title' => 'degree_delete',
            ],
            [
                'id'    => 94,
                'title' => 'degree_access',
            ],
            [
                'id'    => 95,
                'title' => 'department_create',
            ],
            [
                'id'    => 96,
                'title' => 'department_edit',
            ],
            [
                'id'    => 97,
                'title' => 'department_show',
            ],
            [
                'id'    => 98,
                'title' => 'department_delete',
            ],
            [
                'id'    => 99,
                'title' => 'department_access',
            ],
            [
                'id'    => 100,
                'title' => 'centre_create',
            ],
            [
                'id'    => 101,
                'title' => 'centre_edit',
            ],
            [
                'id'    => 102,
                'title' => 'centre_show',
            ],
            [
                'id'    => 103,
                'title' => 'centre_delete',
            ],
            [
                'id'    => 104,
                'title' => 'centre_access',
            ],
            [
                'id'    => 105,
                'title' => 'support_centre_access',
            ],
            [
                'id'    => 106,
                'title' => 'support_status_create',
            ],
            [
                'id'    => 107,
                'title' => 'support_status_edit',
            ],
            [
                'id'    => 108,
                'title' => 'support_status_show',
            ],
            [
                'id'    => 109,
                'title' => 'support_status_delete',
            ],
            [
                'id'    => 110,
                'title' => 'support_status_access',
            ],
            [
                'id'    => 111,
                'title' => 'support_priority_create',
            ],
            [
                'id'    => 112,
                'title' => 'support_priority_edit',
            ],
            [
                'id'    => 113,
                'title' => 'support_priority_show',
            ],
            [
                'id'    => 114,
                'title' => 'support_priority_delete',
            ],
            [
                'id'    => 115,
                'title' => 'support_priority_access',
            ],
            [
                'id'    => 116,
                'title' => 'support_category_create',
            ],
            [
                'id'    => 117,
                'title' => 'support_category_edit',
            ],
            [
                'id'    => 118,
                'title' => 'support_category_show',
            ],
            [
                'id'    => 119,
                'title' => 'support_category_delete',
            ],
            [
                'id'    => 120,
                'title' => 'support_category_access',
            ],
            [
                'id'    => 121,
                'title' => 'support_ticket_create',
            ],
            [
                'id'    => 122,
                'title' => 'support_ticket_edit',
            ],
            [
                'id'    => 123,
                'title' => 'support_ticket_show',
            ],
            [
                'id'    => 124,
                'title' => 'support_ticket_delete',
            ],
            [
                'id'    => 125,
                'title' => 'support_ticket_access',
            ],
            [
                'id'    => 126,
                'title' => 'support_comment_create',
            ],
            [
                'id'    => 127,
                'title' => 'support_comment_edit',
            ],
            [
                'id'    => 128,
                'title' => 'support_comment_show',
            ],
            [
                'id'    => 129,
                'title' => 'support_comment_delete',
            ],
            [
                'id'    => 130,
                'title' => 'support_comment_access',
            ],
            [
                'id'    => 131,
                'title' => 'hall_create',
            ],
            [
                'id'    => 132,
                'title' => 'hall_edit',
            ],
            [
                'id'    => 133,
                'title' => 'hall_show',
            ],
            [
                'id'    => 134,
                'title' => 'hall_delete',
            ],
            [
                'id'    => 135,
                'title' => 'hall_access',
            ],
            [
                'id'    => 136,
                'title' => 'hostel_create',
            ],
            [
                'id'    => 137,
                'title' => 'hostel_edit',
            ],
            [
                'id'    => 138,
                'title' => 'hostel_show',
            ],
            [
                'id'    => 139,
                'title' => 'hostel_delete',
            ],
            [
                'id'    => 140,
                'title' => 'hostel_access',
            ],
            [
                'id'    => 141,
                'title' => 'academic_qualification_create',
            ],
            [
                'id'    => 142,
                'title' => 'academic_qualification_edit',
            ],
            [
                'id'    => 143,
                'title' => 'academic_qualification_show',
            ],
            [
                'id'    => 144,
                'title' => 'academic_qualification_delete',
            ],
            [
                'id'    => 145,
                'title' => 'academic_qualification_access',
            ],
            [
                'id'    => 146,
                'title' => 'qualification_level_create',
            ],
            [
                'id'    => 147,
                'title' => 'qualification_level_edit',
            ],
            [
                'id'    => 148,
                'title' => 'qualification_level_show',
            ],
            [
                'id'    => 149,
                'title' => 'qualification_level_delete',
            ],
            [
                'id'    => 150,
                'title' => 'qualification_level_access',
            ],
            [
                'id'    => 151,
                'title' => 'phone_create',
            ],
            [
                'id'    => 152,
                'title' => 'phone_edit',
            ],
            [
                'id'    => 153,
                'title' => 'phone_show',
            ],
            [
                'id'    => 154,
                'title' => 'phone_delete',
            ],
            [
                'id'    => 155,
                'title' => 'phone_access',
            ],
            [
                'id'    => 156,
                'title' => 'paper_type_create',
            ],
            [
                'id'    => 157,
                'title' => 'paper_type_edit',
            ],
            [
                'id'    => 158,
                'title' => 'paper_type_show',
            ],
            [
                'id'    => 159,
                'title' => 'paper_type_delete',
            ],
            [
                'id'    => 160,
                'title' => 'paper_type_access',
            ],
            [
                'id'    => 161,
                'title' => 'paper_create',
            ],
            [
                'id'    => 162,
                'title' => 'paper_edit',
            ],
            [
                'id'    => 163,
                'title' => 'paper_show',
            ],
            [
                'id'    => 164,
                'title' => 'paper_delete',
            ],
            [
                'id'    => 165,
                'title' => 'paper_access',
            ],
            [
                'id'    => 166,
                'title' => 'enrolment_create',
            ],
            [
                'id'    => 167,
                'title' => 'enrolment_edit',
            ],
            [
                'id'    => 168,
                'title' => 'enrolment_show',
            ],
            [
                'id'    => 169,
                'title' => 'enrolment_delete',
            ],
            [
                'id'    => 170,
                'title' => 'enrolment_access',
            ],
            [
                'id'    => 171,
                'title' => 'student_create',
            ],
            [
                'id'    => 172,
                'title' => 'student_edit',
            ],
            [
                'id'    => 173,
                'title' => 'student_show',
            ],
            [
                'id'    => 174,
                'title' => 'student_delete',
            ],
            [
                'id'    => 175,
                'title' => 'student_access',
            ],
            [
                'id'    => 176,
                'title' => 'employee_create',
            ],
            [
                'id'    => 177,
                'title' => 'employee_edit',
            ],
            [
                'id'    => 178,
                'title' => 'employee_show',
            ],
            [
                'id'    => 179,
                'title' => 'employee_delete',
            ],
            [
                'id'    => 180,
                'title' => 'employee_access',
            ],
            [
                'id'    => 181,
                'title' => 'designation_create',
            ],
            [
                'id'    => 182,
                'title' => 'designation_edit',
            ],
            [
                'id'    => 183,
                'title' => 'designation_show',
            ],
            [
                'id'    => 184,
                'title' => 'designation_delete',
            ],
            [
                'id'    => 185,
                'title' => 'designation_access',
            ],
            [
                'id'    => 186,
                'title' => 'nominee_create',
            ],
            [
                'id'    => 187,
                'title' => 'nominee_edit',
            ],
            [
                'id'    => 188,
                'title' => 'nominee_show',
            ],
            [
                'id'    => 189,
                'title' => 'nominee_delete',
            ],
            [
                'id'    => 190,
                'title' => 'nominee_access',
            ],
            [
                'id'    => 191,
                'title' => 'family_member_create',
            ],
            [
                'id'    => 192,
                'title' => 'family_member_edit',
            ],
            [
                'id'    => 193,
                'title' => 'family_member_show',
            ],
            [
                'id'    => 194,
                'title' => 'family_member_delete',
            ],
            [
                'id'    => 195,
                'title' => 'family_member_access',
            ],
            [
                'id'    => 196,
                'title' => 'controllers_office_access',
            ],
            [
                'id'    => 197,
                'title' => 'dean_students_welfare_access',
            ],
            [
                'id'    => 198,
                'title' => 'registrars_office_access',
            ],
            [
                'id'    => 199,
                'title' => 'system_configuration_access',
            ],
            [
                'id'    => 200,
                'title' => 'hostel_room_create',
            ],
            [
                'id'    => 201,
                'title' => 'hostel_room_edit',
            ],
            [
                'id'    => 202,
                'title' => 'hostel_room_show',
            ],
            [
                'id'    => 203,
                'title' => 'hostel_room_delete',
            ],
            [
                'id'    => 204,
                'title' => 'hostel_room_access',
            ],
            [
                'id'    => 205,
                'title' => 'course_level_create',
            ],
            [
                'id'    => 206,
                'title' => 'course_level_edit',
            ],
            [
                'id'    => 207,
                'title' => 'course_level_show',
            ],
            [
                'id'    => 208,
                'title' => 'course_level_delete',
            ],
            [
                'id'    => 209,
                'title' => 'course_level_access',
            ],
            [
                'id'    => 210,
                'title' => 'academic_session_create',
            ],
            [
                'id'    => 211,
                'title' => 'academic_session_edit',
            ],
            [
                'id'    => 212,
                'title' => 'academic_session_show',
            ],
            [
                'id'    => 213,
                'title' => 'academic_session_delete',
            ],
            [
                'id'    => 214,
                'title' => 'academic_session_access',
            ],
            [
                'id'    => 215,
                'title' => 'postal_code_create',
            ],
            [
                'id'    => 216,
                'title' => 'postal_code_edit',
            ],
            [
                'id'    => 217,
                'title' => 'postal_code_show',
            ],
            [
                'id'    => 218,
                'title' => 'postal_code_delete',
            ],
            [
                'id'    => 219,
                'title' => 'postal_code_access',
            ],
            [
                'id'    => 220,
                'title' => 'finance_office_access',
            ],
            [
                'id'    => 221,
                'title' => 'admission_charge_create',
            ],
            [
                'id'    => 222,
                'title' => 'admission_charge_edit',
            ],
            [
                'id'    => 223,
                'title' => 'admission_charge_show',
            ],
            [
                'id'    => 224,
                'title' => 'admission_charge_delete',
            ],
            [
                'id'    => 225,
                'title' => 'admission_charge_access',
            ],
            [
                'id'    => 226,
                'title' => 'continuation_charge_create',
            ],
            [
                'id'    => 227,
                'title' => 'continuation_charge_edit',
            ],
            [
                'id'    => 228,
                'title' => 'continuation_charge_show',
            ],
            [
                'id'    => 229,
                'title' => 'continuation_charge_delete',
            ],
            [
                'id'    => 230,
                'title' => 'continuation_charge_access',
            ],
            [
                'id'    => 231,
                'title' => 'programme_delivery_mode_create',
            ],
            [
                'id'    => 232,
                'title' => 'programme_delivery_mode_edit',
            ],
            [
                'id'    => 233,
                'title' => 'programme_delivery_mode_show',
            ],
            [
                'id'    => 234,
                'title' => 'programme_delivery_mode_delete',
            ],
            [
                'id'    => 235,
                'title' => 'programme_delivery_mode_access',
            ],
            [
                'id'    => 236,
                'title' => 'admission_entrance_type_create',
            ],
            [
                'id'    => 237,
                'title' => 'admission_entrance_type_edit',
            ],
            [
                'id'    => 238,
                'title' => 'admission_entrance_type_show',
            ],
            [
                'id'    => 239,
                'title' => 'admission_entrance_type_delete',
            ],
            [
                'id'    => 240,
                'title' => 'admission_entrance_type_access',
            ],
            [
                'id'    => 241,
                'title' => 'programme_duration_type_create',
            ],
            [
                'id'    => 242,
                'title' => 'programme_duration_type_edit',
            ],
            [
                'id'    => 243,
                'title' => 'programme_duration_type_show',
            ],
            [
                'id'    => 244,
                'title' => 'programme_duration_type_delete',
            ],
            [
                'id'    => 245,
                'title' => 'programme_duration_type_access',
            ],
            [
                'id'    => 246,
                'title' => 'examination_access',
            ],
            [
                'id'    => 247,
                'title' => 'registration_form_create',
            ],
            [
                'id'    => 248,
                'title' => 'registration_form_edit',
            ],
            [
                'id'    => 249,
                'title' => 'registration_form_show',
            ],
            [
                'id'    => 250,
                'title' => 'registration_form_delete',
            ],
            [
                'id'    => 251,
                'title' => 'registration_form_access',
            ],
            [
                'id'    => 252,
                'title' => 'exam_registration_create',
            ],
            [
                'id'    => 253,
                'title' => 'exam_registration_edit',
            ],
            [
                'id'    => 254,
                'title' => 'exam_registration_show',
            ],
            [
                'id'    => 255,
                'title' => 'exam_registration_delete',
            ],
            [
                'id'    => 256,
                'title' => 'exam_registration_access',
            ],
            [
                'id'    => 257,
                'title' => 'papers_registration_create',
            ],
            [
                'id'    => 258,
                'title' => 'papers_registration_edit',
            ],
            [
                'id'    => 259,
                'title' => 'papers_registration_show',
            ],
            [
                'id'    => 260,
                'title' => 'papers_registration_delete',
            ],
            [
                'id'    => 261,
                'title' => 'papers_registration_access',
            ],
            [
                'id'    => 262,
                'title' => 'setting_access',
            ],
            [
                'id'    => 263,
                'title' => 'employment_status_create',
            ],
            [
                'id'    => 264,
                'title' => 'employment_status_edit',
            ],
            [
                'id'    => 265,
                'title' => 'employment_status_show',
            ],
            [
                'id'    => 266,
                'title' => 'employment_status_delete',
            ],
            [
                'id'    => 267,
                'title' => 'employment_status_access',
            ],
            [
                'id'    => 268,
                'title' => 'caste_create',
            ],
            [
                'id'    => 269,
                'title' => 'caste_edit',
            ],
            [
                'id'    => 270,
                'title' => 'caste_show',
            ],
            [
                'id'    => 271,
                'title' => 'caste_delete',
            ],
            [
                'id'    => 272,
                'title' => 'caste_access',
            ],
            [
                'id'    => 273,
                'title' => 'designation_type_create',
            ],
            [
                'id'    => 274,
                'title' => 'designation_type_edit',
            ],
            [
                'id'    => 275,
                'title' => 'designation_type_show',
            ],
            [
                'id'    => 276,
                'title' => 'designation_type_delete',
            ],
            [
                'id'    => 277,
                'title' => 'designation_type_access',
            ],
            [
                'id'    => 278,
                'title' => 'demographic_access',
            ],
            [
                'id'    => 279,
                'title' => 'biometric_create',
            ],
            [
                'id'    => 280,
                'title' => 'biometric_edit',
            ],
            [
                'id'    => 281,
                'title' => 'biometric_show',
            ],
            [
                'id'    => 282,
                'title' => 'biometric_delete',
            ],
            [
                'id'    => 283,
                'title' => 'biometric_access',
            ],
            [
                'id'    => 284,
                'title' => 'work_experience_create',
            ],
            [
                'id'    => 285,
                'title' => 'work_experience_edit',
            ],
            [
                'id'    => 286,
                'title' => 'work_experience_show',
            ],
            [
                'id'    => 287,
                'title' => 'work_experience_delete',
            ],
            [
                'id'    => 288,
                'title' => 'work_experience_access',
            ],
            [
                'id'    => 289,
                'title' => 'country_create',
            ],
            [
                'id'    => 290,
                'title' => 'country_edit',
            ],
            [
                'id'    => 291,
                'title' => 'country_show',
            ],
            [
                'id'    => 292,
                'title' => 'country_delete',
            ],
            [
                'id'    => 293,
                'title' => 'country_access',
            ],
            [
                'id'    => 294,
                'title' => 'blood_group_create',
            ],
            [
                'id'    => 295,
                'title' => 'blood_group_edit',
            ],
            [
                'id'    => 296,
                'title' => 'blood_group_show',
            ],
            [
                'id'    => 297,
                'title' => 'blood_group_delete',
            ],
            [
                'id'    => 298,
                'title' => 'blood_group_access',
            ],
            [
                'id'    => 299,
                'title' => 'salary_data_create',
            ],
            [
                'id'    => 300,
                'title' => 'salary_data_edit',
            ],
            [
                'id'    => 301,
                'title' => 'salary_data_show',
            ],
            [
                'id'    => 302,
                'title' => 'salary_data_delete',
            ],
            [
                'id'    => 303,
                'title' => 'salary_data_access',
            ],
            [
                'id'    => 304,
                'title' => 'organizational_email_create',
            ],
            [
                'id'    => 305,
                'title' => 'organizational_email_edit',
            ],
            [
                'id'    => 306,
                'title' => 'organizational_email_show',
            ],
            [
                'id'    => 307,
                'title' => 'organizational_email_delete',
            ],
            [
                'id'    => 308,
                'title' => 'organizational_email_access',
            ],
            [
                'id'    => 309,
                'title' => 'computer_centre_data_create',
            ],
            [
                'id'    => 310,
                'title' => 'computer_centre_data_edit',
            ],
            [
                'id'    => 311,
                'title' => 'computer_centre_data_show',
            ],
            [
                'id'    => 312,
                'title' => 'computer_centre_data_delete',
            ],
            [
                'id'    => 313,
                'title' => 'computer_centre_data_access',
            ],
            [
                'id'    => 314,
                'title' => 'answer_script_create',
            ],
            [
                'id'    => 315,
                'title' => 'answer_script_edit',
            ],
            [
                'id'    => 316,
                'title' => 'answer_script_show',
            ],
            [
                'id'    => 317,
                'title' => 'answer_script_delete',
            ],
            [
                'id'    => 318,
                'title' => 'answer_script_access',
            ],
            [
                'id'    => 319,
                'title' => 'course_paper_create',
            ],
            [
                'id'    => 320,
                'title' => 'course_paper_edit',
            ],
            [
                'id'    => 321,
                'title' => 'course_paper_show',
            ],
            [
                'id'    => 322,
                'title' => 'course_paper_delete',
            ],
            [
                'id'    => 323,
                'title' => 'course_paper_access',
            ],
            [
                'id'    => 324,
                'title' => 'course_academic_session_create',
            ],
            [
                'id'    => 325,
                'title' => 'course_academic_session_edit',
            ],
            [
                'id'    => 326,
                'title' => 'course_academic_session_show',
            ],
            [
                'id'    => 327,
                'title' => 'course_academic_session_delete',
            ],
            [
                'id'    => 328,
                'title' => 'course_academic_session_access',
            ],
            [
                'id'    => 329,
                'title' => 'course_student_create',
            ],
            [
                'id'    => 330,
                'title' => 'course_student_edit',
            ],
            [
                'id'    => 331,
                'title' => 'course_student_show',
            ],
            [
                'id'    => 332,
                'title' => 'course_student_delete',
            ],
            [
                'id'    => 333,
                'title' => 'course_student_access',
            ],
            [
                'id'    => 334,
                'title' => 'verification_status_create',
            ],
            [
                'id'    => 335,
                'title' => 'verification_status_edit',
            ],
            [
                'id'    => 336,
                'title' => 'verification_status_show',
            ],
            [
                'id'    => 337,
                'title' => 'verification_status_delete',
            ],
            [
                'id'    => 338,
                'title' => 'verification_status_access',
            ],
            [
                'id'    => 339,
                'title' => 'examination_schedule_create',
            ],
            [
                'id'    => 340,
                'title' => 'examination_schedule_edit',
            ],
            [
                'id'    => 341,
                'title' => 'examination_schedule_show',
            ],
            [
                'id'    => 342,
                'title' => 'examination_schedule_delete',
            ],
            [
                'id'    => 343,
                'title' => 'examination_schedule_access',
            ],
            [
                'id'    => 344,
                'title' => 'examiner_create',
            ],
            [
                'id'    => 345,
                'title' => 'examiner_edit',
            ],
            [
                'id'    => 346,
                'title' => 'examiner_show',
            ],
            [
                'id'    => 347,
                'title' => 'examiner_delete',
            ],
            [
                'id'    => 348,
                'title' => 'examiner_access',
            ],
            [
                'id'    => 349,
                'title' => 'admission_access',
            ],
            [
                'id'    => 350,
                'title' => 'student_admission_create',
            ],
            [
                'id'    => 351,
                'title' => 'student_admission_edit',
            ],
            [
                'id'    => 352,
                'title' => 'student_admission_show',
            ],
            [
                'id'    => 353,
                'title' => 'student_admission_delete',
            ],
            [
                'id'    => 354,
                'title' => 'student_admission_access',
            ],
            [
                'id'    => 355,
                'title' => 'research_unit_access',
            ],
            [
                'id'    => 356,
                'title' => 'research_scholar_create',
            ],
            [
                'id'    => 357,
                'title' => 'research_scholar_edit',
            ],
            [
                'id'    => 358,
                'title' => 'research_scholar_show',
            ],
            [
                'id'    => 359,
                'title' => 'research_scholar_delete',
            ],
            [
                'id'    => 360,
                'title' => 'research_scholar_access',
            ],
            [
                'id'    => 361,
                'title' => 'content_management_system_access',
            ],
            [
                'id'    => 362,
                'title' => 'content_category_create',
            ],
            [
                'id'    => 363,
                'title' => 'content_category_edit',
            ],
            [
                'id'    => 364,
                'title' => 'content_category_show',
            ],
            [
                'id'    => 365,
                'title' => 'content_category_delete',
            ],
            [
                'id'    => 366,
                'title' => 'content_category_access',
            ],
            [
                'id'    => 367,
                'title' => 'content_tag_create',
            ],
            [
                'id'    => 368,
                'title' => 'content_tag_edit',
            ],
            [
                'id'    => 369,
                'title' => 'content_tag_show',
            ],
            [
                'id'    => 370,
                'title' => 'content_tag_delete',
            ],
            [
                'id'    => 371,
                'title' => 'content_tag_access',
            ],
            [
                'id'    => 372,
                'title' => 'content_page_create',
            ],
            [
                'id'    => 373,
                'title' => 'content_page_edit',
            ],
            [
                'id'    => 374,
                'title' => 'content_page_show',
            ],
            [
                'id'    => 375,
                'title' => 'content_page_delete',
            ],
            [
                'id'    => 376,
                'title' => 'content_page_access',
            ],
            [
                'id'    => 377,
                'title' => 'website_create',
            ],
            [
                'id'    => 378,
                'title' => 'website_edit',
            ],
            [
                'id'    => 379,
                'title' => 'website_show',
            ],
            [
                'id'    => 380,
                'title' => 'website_delete',
            ],
            [
                'id'    => 381,
                'title' => 'website_access',
            ],
            [
                'id'    => 382,
                'title' => 'examination_mark_create',
            ],
            [
                'id'    => 383,
                'title' => 'examination_mark_edit',
            ],
            [
                'id'    => 384,
                'title' => 'examination_mark_show',
            ],
            [
                'id'    => 385,
                'title' => 'examination_mark_delete',
            ],
            [
                'id'    => 386,
                'title' => 'examination_mark_access',
            ],
            [
                'id'    => 387,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
