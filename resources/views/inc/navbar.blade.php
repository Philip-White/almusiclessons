<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand brand" href="/">{{config('app.name', 'drummerPage')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="/about">About <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/services">Services</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/lessons">Lessons</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/lessons/create">Create a Lesson</a>
          </li>
      </ul>
    </div>
  </nav>