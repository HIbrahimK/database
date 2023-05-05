<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>


        <title>Laravel</title>
    @livewireStyles

    </head>
    <body>
      @livewire('hello-world',['name'=>'Chico'])

      <hr>
      @livewire('say-hi', ['name'=>$name])
      @livewireScripts
    </body>
</html>
