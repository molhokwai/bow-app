#extends('layout')

#block('title')
  Edit article
#endblock

#block('content')

  <div>
    <a href="/articles/list">View articles</a>
  </div>

  <h1>Edit article: {{ $article->title }}</h1>

  <form method="POST" action="/articles/edit/{{ $article->id }}">
    <div class="field">
      <label>Title</label>
      <input type="text" name="title" value="{{ $article->title }}"/>
    </div>
    <div class="field">
      <label>Body</label>
      <textarea name="body">{{ $article->body }}</textarea>
    </div>
    <div class="field">
      {{{ csrf_field() }}}
      <input type="hidden" name="id" value="{{ $article->id }}"/>
      <input type="hidden" name="user_id" value="{{ $article->user_id }}"/>
      <input type="hidden" name="created" value="{{ $article->created }}"/>
      <input type="submit" value="Update"/>
      | <a href="javascript:confirmDelete('this', {{ $article->id }})">Delete</a>
    </div>
  </form>

#endblock


#block('script')
  <script type="text/javascript">
    const confirmDelete = (title, id) => {
        if(confirm(`Are you sure you wish to delete article "${title}"?`)){
            window.location = `/articles/delete/${id}`
        }
    }
    
  </script>
