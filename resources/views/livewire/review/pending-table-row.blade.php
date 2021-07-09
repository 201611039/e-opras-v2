<tr>
    <td>{{ $key+1 }}</td>
    <td>{{ $row->opras->user->full_name }}</td>
    <td>{{ $row->opras->user->email }}</td>
    <td>{{ $row->opras->user->phone }}</td>
    <td>{{ $row->opras->personalInformation->post->name }}</td>
    <td><a href="{{ route("review.$route", $row->opras->slug) }}" class="btn btn-sm btn-warning">Review</a></td>
</tr>
