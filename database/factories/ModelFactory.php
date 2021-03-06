<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(
    App\Models\User::class,
    function (Faker\Generator $faker) {
        return [
            'name'                 => $faker->name,
            'email'                => $faker->email,
            'password'             => bcrypt(str_random(10)),
            'remember_token'       => str_random(10),
            'gender'               => 1,
            'telephone'            => $faker->phoneNumber,
            'birthday'             => $faker->date('Y-m-d'),
            'locale'               => $faker->languageCode,
            'address'              => $faker->address,
            'last_notification_id' => 0,
            'api_access_token'     => '',
            'profile_image_id'     => 0,
            'is_activated'         => 0,
        ];
    }
);

$factory->define(
    App\Models\AdminUser::class,
    function (Faker\Generator $faker) {
        return [
            'name'                 => $faker->name,
            'email'                => $faker->email,
            'password'             => bcrypt(str_random(10)),
            'remember_token'       => str_random(10),
            'locale'               => $faker->languageCode,
            'last_notification_id' => 0,
            'api_access_token'     => '',
            'profile_image_id'     => 0,
        ];
    }
);

$factory->define(
    App\Models\AdminUserRole::class,
    function (Faker\Generator $faker) {
        return [
            'admin_user_id' => $faker->randomNumber(),
            'role'          => 'supper_user',
        ];
    }
);

$factory->define(
    App\Models\SiteConfiguration::class,
    function (Faker\Generator $faker) {
        return [
            'locale'                => 'ja',
            'name'                  => $faker->name,
            'title'                 => $faker->sentence,
            'keywords'              => implode(
                ',',
                $faker->words(5)
            ),
            'description'           => $faker->sentences(
                3,
                true
            ),
            'ogp_image_id'          => 0,
            'twitter_card_image_id' => 0,
        ];
    }
);

$factory->define(
    App\Models\Image::class,
    function (Faker\Generator $faker) {
        return [
            'url'                => $faker->imageUrl(),
            'title'              => $faker->sentence,
            'is_local'           => false,
            'entity_type'        => $faker->word,
            'entity_id'          => 0,
            'file_category_type' => $faker->word,
            's3_key'             => $faker->word,
            's3_bucket'          => $faker->word,
            's3_region'          => $faker->word,
            's3_extension'       => 'png',
            'media_type'         => 'image/png',
            'format'             => 'png',
            'file_size'          => 0,
            'width'              => 100,
            'height'             => 100,
            'is_enabled'         => true,
        ];
    }
);

$factory->define(
    App\Models\Article::class,
    function (Faker\Generator $faker) {
        return [
            'slug'               => $faker->word,
            'title'              => $faker->sentence,
            'keywords'           => implode(
                ',',
                $faker->words(5)
            ),
            'description'        => $faker->sentences(
                3,
                true
            ),
            'content'            => $faker->sentences(
                3,
                true
            ),
            'cover_image_id'     => 0,
            'locale'             => 'ja',
            'is_enabled'         => true,
            'publish_started_at' => $faker->dateTime->format('Y-m-d H:i:s'),
            'publish_ended_at'   => $faker->dateTime->format('Y-m-d H:i:s'),
        ];
    }
);

$factory->define(
    App\Models\UserNotification::class,
    function (Faker\Generator $faker) {
        return [
            'user_id'       => \App\Models\UserNotification::BROADCAST_USER_ID,
            'category_type' => \App\Models\UserNotification::CATEGORY_TYPE_APPLICATION,
            'type'          => \App\Models\UserNotification::TYPE_NOTIFICATION,
            'data'          => '',
            'locale'        => 'en',
            'content'       => 'TEST',
            'read'          => false,
            'sent_at'       => $faker->dateTime,
        ];
    }
);

$factory->define(
    App\Models\AdminUserNotification::class,
    function (Faker\Generator $faker) {
        return [
            'user_id'       => \App\Models\AdminUserNotification::BROADCAST_USER_ID,
            'category_type' => \App\Models\AdminUserNotification::CATEGORY_TYPE_APPLICATION,
            'type'          => \App\Models\AdminUserNotification::TYPE_NOTIFICATION,
            'data'          => '',
            'locale'        => 'en',
            'content'       => 'TEST',
            'read'          => false,
            'sent_at'       => $faker->dateTime,
        ];
    }
);

$factory->define(
    App\Models\OauthClient::class,
    function (Faker\Generator $faker) {
        return [
            'user_id'                => 1,
            'name'                   => $faker->name,
            'secret'                 => $faker->password,
            'redirect'               => $faker->url,
            'personal_access_client' => $faker->boolean,
            'password_client'        => $faker->boolean,
            'revoked'                => $faker->boolean,
        ];
    }
);

$factory->define(App\Models\Banner::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'cover_image_id' => '',
        'title' => '',
        'description' => '',
        'admin_user_id' => '',
        'order' => '',
        'is_enabled' => '',
    ];
});

$factory->define(App\Models\Heading::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'title_heading' => '',
        'heading_description' => '',
        'title_group' => '',
        'title_data_highlight' => '',
        'title_news' => '',
        'title_company' => '',
        'title_support' => '',
        'support_description' => '',
    ];
});

$factory->define(App\Models\Video::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'cover_image_id' => '',
        'video_url' => '',
    ];
});

$factory->define(App\Models\InforGroup::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'cover_image_id' => '',
        'thumbnail_image_id' => '',
        'description' => '',
    ];
});

$factory->define(App\Models\DataHighLight::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(App\Models\DataHighlight::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'cover_image_id' => '',
        'title' => '',
        'data' => '',
    ];
});

$factory->define(App\Models\Company::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'name' => '',
        'cover_image_id' => '',
        'link' => '',
        'is_enabled' => '',
    ];
});

$factory->define(App\Models\Introduce::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'title_introduce' => '',
        'title_leader_ship' => '',
        'content_image_id' => '',
        'mission_image_id' => '',
        'content' => '',
        'mission' => '',
        'content_intro' => '',
        'overview_intro' => '',
        'diagram_image_id' => '',
    ];
});

$factory->define(App\Models\Partner::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'cover_image_id' => '',
        'name' => '',
        'link' => '',
    ];
});

$factory->define(App\Models\History::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'date_start' => '',
        'cover_image_id' => '',
        'content' => '',
    ];
});

$factory->define(App\Models\LeaderShip::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'cover_image_id' => '',
        'name' => '',
        'position' => '',
        'file' => '',
        'order' => '',
        'is_enabled' => '',
    ];
});

$factory->define(App\Models\Field::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'name' => '',
        'slug' => '',
        'meta_title' => '',
        'meta_description' => '',
        'cover_image_id' => '',
        'title' => '',
        'content' => '',
        'icon1_image_id' => '',
        'charact_1' => '',
        'des_1' => '',
        'icon2_image_id' => '',
        'charact_2' => '',
        'des_2' => '',
        'icon3_image_id' => '',
        'charact_3' => '',
        'des_3' => '',
        'order' => '',
        'is_enabled' => '',
    ];
});

$factory->define(App\Models\Project::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'cover_image_id' => '',
        'name' => '',
        'address' => '',
        'link' => '',
        'order' => '',
    ];
});

$factory->define(App\Models\NewCategory::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'name' => '',
        'slug' => '',
        'meta_title' => '',
        'meta_description' => '',
        'order' => '',
    ];
});

$factory->define(App\Models\TableNew::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'name' => '',
        'slug' => '',
        'cover_image_id' => '',
        'new_category_id' => '',
        'display' => '',
        'order' => '',
        'meta_title' => '',
        'meta_description' => '',
        'sapo' => '',
        'content' => '',
        'auth' => '',
        'is_enabled' => '',
    ];
});

$factory->define(App\Models\CulturalCompany::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'title_page' => '',
        'introduce' => '',
        'content' => '',
        'meta_title' => '',
        'meta_description1' => '',
        'meta_description2' => '',
        'icon1_image_id' => '',
        'reason1' => '',
        'detail1' => '',
        'icon2_image_id' => '',
        'reason2' => '',
        'detail2' => '',
        'icon3_image_id' => '',
        'reason3' => '',
        'detail3' => '',
        'ttvn_image_id' => '',
        'ttvn_title' => '',
        'ttvn_content' => '',
        'we_find_introduce' => '',
    ];
});

$factory->define(App\Models\CriteriaCandidate::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'icon_image_id' => '',
        'name' => '',
        'content' => '',
    ];
});

$factory->define(App\Models\JobCategory::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'name' => '',
    ];
});

$factory->define(App\Models\Job::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'name' => '',
        'job_category_id' => '',
        'slug' => '',
        'meta_title' => '',
        'meta_description' => '',
        'company_id' => '',
        'province' => '',
        'district' => '',
        'number' => '',
        'salary' => '',
        'end_time' => '',
        'order' => '',
        'description' => '',
        'is_enabled' => '',
    ];
});

$factory->define(App\Models\Meta::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(App\Models\Footer::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'hn_name' => '',
        'hn_address' => '',
        'hn_phone' => '',
        'hn_fax' => '',
        'other_name' => '',
        'other_address' => '',
        'other_phone' => '',
        'other_fax' => '',
        'fb_link' => '',
        'skype_link' => '',
        'email' => '',
    ];
});

$factory->define(App\Models\Contact::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'name' => '',
        'email' => '',
        'phone' => '',
        'content' => '',
        'message_type' => '',
        'is_read' => '',
    ];
});

$factory->define(App\Models\Cadidate::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'name' => '',
        'phone' => '',
        'email' => '',
        'file' => '',
        'link_job' => '',
    ];
});

$factory->define(App\Models\SaveValue::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'cover_image_id' => '',
        'value' => '',
        'content' => '',
    ];
});

$factory->define(App\Models\TableNew::class, function (Faker\Generator $faker) {
    return [
        'id' => '',
        'name' => '',
        'slug' => '',
        'cover_image_id' => '',
        'new_category_id' => '',
        'display' => '',
        'order' => '',
        'meta_title' => '',
        'meta_description' => '',
        'sapo' => '',
        'content' => '',
        'auth' => '',
        'is_enabled' => '',
    ];
});

/* NEW MODEL FACTORY */
