<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;

use App\Filament\Admin\Widgets\GrafikJumlahBayarPerProdi;
use App\Filament\Admin\Widgets\GrafikPendaftarPerJalur;
use App\Filament\Admin\Widgets\GrafikStatusBayar;
use App\Filament\Admin\Widgets\GrafikStatusSeleksi;
use App\Filament\Admin\Widgets\GrafikPendaftarPerProvinsi;
use App\Filament\Admin\Widgets\GrafikPendaftarPerGender;
use App\Filament\Admin\Widgets\GrafikPendaftarPerLulusan;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            // ⬇️ tambahkan argumen `for:` di sini
            ->discoverResources(
                in: app_path('Filament/Admin/Resources'),
                for: 'App\\Filament\\Admin\\Resources',
            )
            ->discoverPages(
                in: app_path('Filament/Admin/Pages'),
                for: 'App\\Filament\\Admin\\Pages',
            )
            ->discoverWidgets(
                in: app_path('Filament/Admin/Widgets'),
                for: 'App\\Filament\\Admin\\Widgets',
            )
            ->pages([
                \App\Filament\Admin\Pages\Dashboard::class,
                \App\Filament\Admin\Pages\StatistikDashboard::class,
            ])
            ->widgets([
                GrafikJumlahBayarPerProdi::class,
                GrafikPendaftarPerJalur::class,
                GrafikStatusBayar::class,
                GrafikStatusSeleksi::class,
                GrafikPendaftarPerProvinsi::class,
                GrafikPendaftarPerGender::class,
                GrafikPendaftarPerLulusan::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
