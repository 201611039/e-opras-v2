<div>
    <table class="table table-borderless table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone #</th>
                <th>Desgination</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($rows as $key => $row)
                @livewire('review.pending-table-row', ['row' => $row, 'key' => $key], key($key))
            @endforeach
        </tbody>
    </table>
</div>
