<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="referrer" content="always">

    <link rel="preconnect" href="https://fonts.gstatic.com">

    <title>{{ isset($title) ? "{$title} |" : '' }} {{ isset($originTitle) ? "{$originTitle} |" : '' }} Mailcoach</title>

    @livewireStyles()
</head>
<body class="antialiased">
    @livewire('dropblockeditor-mailcoach::editor', [
        'title' => $model->name,
        'model' => $model,
        'activeBlocks' => $activeBlocks,
        'base' => $base
    ])

    @include('mailcoach::app.layouts.partials.flash')

    @livewireScripts()

    @livewire('livewire-ui-spotlight')

    {!! \Spatie\Mailcoach\Mailcoach::styles() !!}

    {!! \Spatie\Mailcoach\Mailcoach::scripts() !!}
</body>
</html>
