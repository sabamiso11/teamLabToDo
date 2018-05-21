<html lang="ja">
  <head>
    <title>Laravelチュートリアル</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
-->  </head>
  <body class="p-3">
    <h1>タスク一覧</h1>

    <form method="post" action="/create">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="nameInput">ToDoリスト名</label>
        <input type="text" class="form-control" id="titleInput" name="list_name">
      </div>
      <button type="submit" class="btn btn-primary">新規追加</button>
    </form>

    <!-- 追加完了時にフラッシュメッセージ　-->
    @if(Session::has('message'))
      <div class="bg-info">
        <p>{{ Session::get('message') }}</p>
      </div>
    @endif

    @if ($errors->has('list_name'))
    <div class="bg-info">
    <p class="error">{{ $errors->first('list_name') }}</p>
    </div>
    @endif

    @foreach ($lists as $list)
      <div>
        <ul>
          <li><a href="{{ url('/lists', $list) }}">{{ $list->list_name }}</a></li>
          <li>{{ $list->tasks_count }}個中{{ $list->done_count }}個がチェック済み</li>
          @foreach($dead_lines as $dead_line)
            @if($dead_line->id == $list->id)
              @foreach($dead_line->tasks as $task_limit)
                @if($loop->first)
                  <li>{{ $task_limit->limit }}</li>
                @endif
              @endforeach
            @endif
          @endforeach
        </ul>
      </div>
    @endforeach

<!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
-->  </body>
</html>
