@extends('layouts.app')

@section('content')
<div class="container">
    
    <h1>Admin interface</h1>

    
    @can('upgrade admin')
    
    <div> 
        <div>
            filtres: {{$msg}}
        </div> 

        <a href="{{url('/admin')}}" class="btn-primary">
            Tous
        </a>
        
        <a href="{{url('/admin').'/'.'admin'}}" class="btn-primary">
            admin
        </a>        
        <a href="{{url('/admin').'/'.'user'}}" class="btn-primary">
            utilisateur
        </a>        
        <a href="{{url('/admin').'/'.'online'}}" class="btn-primary">
            en ligne
        </a>
        <div>
            résultat: {{count($data)}}
        </div> 
    </div>

        <div> liste des utilisateurs: </div>
        
        @if ($data)
            <table class="table">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>nom</th>
                        <th>roles</th>
                        <th>ajouter droit</th>
                        <th>retirer</th>
                        <th>supprimer</th>
                        <th>en ligne</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td>
                            {{$item->id}}
                        </td>
                        <td>
                                {{$item->name}}
                            </td>
                            <td>
                                {{$item->getRoleNames()}}
                            </td>
                            <td>
                                <a href="{{url('/admin/moveUp').'/'.$item->id}}" class="btn-primary">
                                    <button>+</button>
                                </a>
                            </td>
                            <td>
                                <a href="{{url('/admin/moveDown').'/'.$item->id}}" class="btn-primary">
                                    <button>-</button>
                                </a>
                            </td>
                            <td>
                                <button>X</button>
                            </td>   
                            <td>
                                @if ($item->active === 1)
                                    <button class="btn btn-success">oui</button>
                                @else
                                    <button class="btn btn-danger">non</button>
                                @endif
                            </td>                     
                        </tr>
                    @endforeach
                </tbody>
            </table>            
        @endif
    @endcan



</div>    
@endsection