<!-- Main Content -->
@extends('layouts.master')

@section('konten')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Profile</h1>
      <div class="section-header-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard_user') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
          <li class="breadcrumb-item active" aria-current="page"><i class="fas fa-user"></i> Profile</li>
        </ol>
      </div>
    </div>
    <div class="section-body">
      <h2 class="section-title">Hi, {{ Auth::user()->name }}!</h2>
      <p class="section-lead">
        Change information about yourself on this page.
      </p>

      <x-app-layout>

        <div>
          <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            @livewire('profile.update-profile-information-form')


            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            <div class="mt-10 sm:mt-0">
              @livewire('profile.update-password-form')
            </div>

            <x-section-border />
            @endif

            {{-- @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
          <div class="mt-10 sm:mt-0">
              @livewire('profile.two-factor-authentication-form')
          </div>

          <x-section-border />
      @endif

      <div class="mt-10 sm:mt-0">
          @livewire('profile.logout-other-browser-sessions-form')
      </div>

      @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
          <x-section-border />

          <div class="mt-10 sm:mt-0">
              @livewire('profile.delete-user-form')
          </div>
      @endif --}}
          </div>
        </div>
      </x-app-layout>
    </div>
</div>
</section>
</div>

@endsection