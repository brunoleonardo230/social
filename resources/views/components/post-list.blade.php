@forelse($posts as $post)
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <img src="{{url('storage/user.jpg')}}" width="50" alt="User" class="img-circle border">
                    {{$post->user->name}} -
                    <small>{{$post->created_at->format('d/m/Y')}}</small>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            {{$post->post}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@empty
    <div class="row">
        <div class="col-md-12 text-center">
            <h2>Nenhum post encontrado!</h2>
        </div>
    </div>
@endforelse     
{{$posts->links()}}      