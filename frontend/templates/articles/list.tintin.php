#extends('layout')

#block('title')
  View articles
#endblock

#block('content')
      <h1>Articles</h1>

      <div>
        <a href="/articles/add">Add article</a>
      </div>

      <table>
          <tr>
              <th>Title</th>
              <th>Created</th>
              <th>Action</th>
          </tr>

          #loop($articles as $article)
              <tr>
                  <td>
                      <a href="{{ $article->slug }}">{{ $article->title }}</a>
                  </td>
                  <td>
                      {{ $article->created }}
                  </td>
                  <td>
                      <a href="/articles/view/{{ $article->id }}">View</a> | 
                      <a href="/articles/edit/{{ $article->id }}">Edit</a> | 
                      <a href="javascript:confirmDelete('{{ $article->title }}', {{ $article->id }})">Delete</a>
                  </td>
              </tr>
          #endloop
      </table>
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
