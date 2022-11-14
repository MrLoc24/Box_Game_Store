<tbody>
    @foreach ($users as $key => $user)
        <tr>
            <td><img src="{{ asset($user->image) }}" width="50px" height="50px">
            </td>

            <td>{{ $user->userID }}</td>
            <td>{{ $user->username }}</td>
            {{-- $game->column name!!!!!! --}}
            <td>{{ $user->email }}</td>
            <td>
                @if ($user->status == 1)
                    <span class="btn btn-success">Active</span>
                @else
                    <span class="btn btn-danger">Inactive</span>
                @endif
            </td>
            <td>
                @if ($user->blocked_at != null)
                    <button class="btn btn-success"
                        wire:click.prevent="activateUser('{{ $user->userID }}')">Activate</button>
                @else
                    <button class="btn btn-danger"
                        wire:click.prevent="deactivateUser('{{ $user->userID }}')">Deactivate</button>
                @endif
                <button type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#delete{{ $user->userID }}">Delete</button>
            </td>
        </tr>
        {{-- Popup delete message --}}
        <div class="modal fade" id="delete{{ $user->userID }}" tabindex="-1" role="dialog"
            aria-labelledby="demoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-center" style="color: red">WARNING !!!!!</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>Confirm delete one of our customers</h4>
                        <img src="{{ asset('img/john-cena-are-you-sure-about-that.gif') }}"
                            class="rounded mx-auto d-block" alt="...">
                    </div>
                    <div class="modal-footer">
                        <a href="/admin/user/delete/{{ $user->userID }}" class="btn btn-danger">DELETE</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                    </div>
                </div>

            </div>
        </div>
    @endforeach
</tbody>
