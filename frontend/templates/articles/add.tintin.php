#extends('layout')

#block('title')
  Add article
#endblock

#block('content')

  <div>
    <a href="/articles/list">View articles</a>
  </div>

  <h1>Add article</h1>

  <form method="POST" action="/articles/add">
    <div class="field">
      <label>Title</label>
      <input type="text" name="title" value="{{ $article->title }}"/>
    </div>
    <div class="field">
      <label>Body</label>
      <textarea name="body">{{ $article->body }}</textarea>
    </div>
    <!-- div class="field">
      <label>Created</label>
      <input type="text" name="created" value="{{ $article->created }}"/>
    </div -->
    <div class="field">
      {{{ csrf_field() }}}
      <input type="submit" value="Add"/>
    </div>
  </form>

#endblock


#block('script')
#endblock
