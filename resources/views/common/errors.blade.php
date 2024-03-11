 <!-- resources/views/common/errors.blade.php -->
 <!--проверка ввода-->

@if (count($errors) > 0)
  <!-- Список ошибок формы -->
  <div class="alert alert-danger">
    <strong>Проверьте ввод!</strong>

    <br><br>

    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
