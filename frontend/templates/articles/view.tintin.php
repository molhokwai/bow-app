#extends('layout')

#block('title')
  View article
#endblock

#block('content')

  <div>
    <a href="/articles/list">View articles</a>
  </div>

  <h1>{{ $article->title }}</h1>

  <p>{{ $article->body }}</p>

  <p><small>Created: {{ $article->created }}</small></p>
  <p><small>Modified: {{ $article->modified }}</small></p>

  <p><a href="/articles/edit/{{ $article->id }}">Edit</a>
   | <a href="javascript:confirmDelete('this', {{ $article->id }})">Delete</a>
  </p>

#endblock


#block('script')
  <script type="text/javascript">
    const confirmDelete = (title, id) => {
        if(confirm(`Are you sure you wish to delete article "${title}"?`)){
            window.location = `/articles/delete/${id}`
        }
    }
    
  </script>
#endblock
