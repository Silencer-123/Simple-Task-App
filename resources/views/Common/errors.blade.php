 @if (count($errors) > 0)
 <!-- Form Error List -->
  <div class="alert alert-danger">

    <ul>
    @foreach ($errors->all() as $error)
    <li><script>
    alert("{{ $error }}")
    </script></li>
    @endforeach
    </ul>

  </div>
 @endif