<!DOCTYPE html>
<html lang="en">

<head>
  @include('includes.head')
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
    @include('includes.navbar')
  </nav>

  <main class="container">
    @yield('content')
  </main>

</body>

</html>