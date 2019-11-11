<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryBindServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     */
    public function boot() {
        //
    }

    /**
     * Register any application services.
     */
    public function register() {
        $this->app->singleton(
            \App\Repositories\AdminUserRepositoryInterface::class,
            \App\Repositories\Eloquent\AdminUserRepository::class
        );
        $this->app->singleton(
            \App\Repositories\AdminUserRoleRepositoryInterface::class,
            \App\Repositories\Eloquent\AdminUserRoleRepository::class
        );
        $this->app->singleton(
            \App\Repositories\UserRepositoryInterface::class,
            \App\Repositories\Eloquent\UserRepository::class
        );
        $this->app->singleton(
            \App\Repositories\FileRepositoryInterface::class,
            \App\Repositories\Eloquent\FileRepository::class
        );
        $this->app->singleton(
            \App\Repositories\ImageRepositoryInterface::class,
            \App\Repositories\Eloquent\ImageRepository::class
        );
        $this->app->singleton(
            \App\Repositories\UserServiceAuthenticationRepositoryInterface::class,
            \App\Repositories\Eloquent\UserServiceAuthenticationRepository::class
        );
        $this->app->singleton(
            \App\Repositories\PasswordResettableRepositoryInterface::class,
            \App\Repositories\Eloquent\PasswordResettableRepository::class
        );
        $this->app->singleton(
            \App\Repositories\UserPasswordResetRepositoryInterface::class,
            \App\Repositories\Eloquent\UserPasswordResetRepository::class
        );
        $this->app->singleton(
            \App\Repositories\AdminPasswordResetRepositoryInterface::class,
            \App\Repositories\Eloquent\AdminPasswordResetRepository::class
        );
        $this->app->singleton(
            \App\Repositories\ArticleRepositoryInterface::class,
            \App\Repositories\Eloquent\ArticleRepository::class
        );
        $this->app->singleton(
            \App\Repositories\NotificationRepositoryInterface::class,
            \App\Repositories\Eloquent\NotificationRepository::class
        );
        $this->app->singleton(
            \App\Repositories\UserNotificationRepositoryInterface::class,
            \App\Repositories\Eloquent\UserNotificationRepository::class
        );
        $this->app->singleton(
            \App\Repositories\AdminUserNotificationRepositoryInterface::class,
            \App\Repositories\Eloquent\AdminUserNotificationRepository::class
        );

        $this->app->singleton(
            \App\Repositories\LogRepositoryInterface::class,
            \App\Repositories\Eloquent\LogRepository::class
        );

        $this->app->singleton(
            \App\Repositories\OauthClientRepositoryInterface::class,
            \App\Repositories\Eloquent\OauthClientRepository::class
        );

        $this->app->singleton(
            \App\Repositories\OauthAccessTokenRepositoryInterface::class,
            \App\Repositories\Eloquent\OauthAccessTokenRepository::class
        );

        $this->app->singleton(
            \App\Repositories\OauthRefreshTokenRepositoryInterface::class,
            \App\Repositories\Eloquent\OauthRefreshTokenRepository::class
        );
        $this->app->singleton(
            \App\Repositories\TableNewRepositoryInterface::class,
            \App\Repositories\Eloquent\TableNewRepository::class
        );

        $this->app->singleton(
            \App\Repositories\BannerRepositoryInterface::class,
            \App\Repositories\Eloquent\BannerRepository::class
        );

        $this->app->singleton(
            \App\Repositories\VideoRepositoryInterface::class,
            \App\Repositories\Eloquent\VideoRepository::class
        );

        $this->app->singleton(
            \App\Repositories\HeadingRepositoryInterface::class,
            \App\Repositories\Eloquent\HeadingRepository::class
        );

        $this->app->singleton(
            \App\Repositories\InforGroupRepositoryInterface::class,
            \App\Repositories\Eloquent\InforGroupRepository::class
        );

        $this->app->singleton(
            \App\Repositories\DataHighLightRepositoryInterface::class,
            \App\Repositories\Eloquent\DataHighLightRepository::class
        );

        $this->app->singleton(
            \App\Repositories\CompanyRepositoryInterface::class,
            \App\Repositories\Eloquent\CompanyRepository::class
        );

        $this->app->singleton(
            \App\Repositories\IntroduceRepositoryInterface::class,
            \App\Repositories\Eloquent\IntroduceRepository::class
        );

        $this->app->singleton(
            \App\Repositories\PartnerRepositoryInterface::class,
            \App\Repositories\Eloquent\PartnerRepository::class
        );

        $this->app->singleton(
            \App\Repositories\HistoryRepositoryInterface::class,
            \App\Repositories\Eloquent\HistoryRepository::class
        );

        $this->app->singleton(
            \App\Repositories\LeaderShipRepositoryInterface::class,
            \App\Repositories\Eloquent\LeaderShipRepository::class
        );

        $this->app->singleton(
            \App\Repositories\FieldRepositoryInterface::class,
            \App\Repositories\Eloquent\FieldRepository::class
        );

        $this->app->singleton(
            \App\Repositories\ProjectRepositoryInterface::class,
            \App\Repositories\Eloquent\ProjectRepository::class
        );

        $this->app->singleton(
            \App\Repositories\NewCategoryRepositoryInterface::class,
            \App\Repositories\Eloquent\NewCategoryRepository::class
        );

        $this->app->singleton(
            \App\Repositories\CulturalCompanyRepositoryInterface::class,
            \App\Repositories\Eloquent\CulturalCompanyRepository::class
        );

        $this->app->singleton(
            \App\Repositories\CriteriaCandidateRepositoryInterface::class,
            \App\Repositories\Eloquent\CriteriaCandidateRepository::class
        );

        $this->app->singleton(
            \App\Repositories\JobCategoryRepositoryInterface::class,
            \App\Repositories\Eloquent\JobCategoryRepository::class
        );

        $this->app->singleton(
            \App\Repositories\JobRepositoryInterface::class,
            \App\Repositories\Eloquent\JobRepository::class
        );

        $this->app->singleton(
            \App\Repositories\MetaRepositoryInterface::class,
            \App\Repositories\Eloquent\MetaRepository::class
        );

        $this->app->singleton(
            \App\Repositories\FooterRepositoryInterface::class,
            \App\Repositories\Eloquent\FooterRepository::class
        );

        $this->app->singleton(
            \App\Repositories\ContactRepositoryInterface::class,
            \App\Repositories\Eloquent\ContactRepository::class
        );

        $this->app->singleton(
            \App\Repositories\CadidateRepositoryInterface::class,
            \App\Repositories\Eloquent\CadidateRepository::class
        );

        $this->app->singleton(
            \App\Repositories\SaveValueRepositoryInterface::class,
            \App\Repositories\Eloquent\SaveValueRepository::class
        );

        $this->app->singleton(
            \App\Repositories\TableNewRepositoryInterface::class,
            \App\Repositories\Eloquent\TableNewRepository::class
        );

        /* NEW BINDING */
    }
}
