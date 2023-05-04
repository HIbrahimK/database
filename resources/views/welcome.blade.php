<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>


        <title>Laravel</title>
    @livewireStyles

    </head>
    <body>
      @livewire('hello-world')

      @livewireScripts
    </body>
</html>
