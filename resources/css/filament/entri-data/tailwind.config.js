import preset from '../../../../vendor/filament/filament/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/EntriData/**/*.php',
        './resources/views/filament/entri-data/**/*.blade.php',
        './resources/views/filament/pages/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
    ],
}
