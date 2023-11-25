<div>
    <form action="{{ url()->current() }}" method="get">
        <input type="search" name="search" placeholder="Search" value="{{ $search }}" />
        <button type="submit">Search</button>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Patient</th>
                <th>Category</th>
                <th>Card Number</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($patients as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->category->name }}</td>
                    <td>{{ $p->card_number }}</td>
                    <td><a href="{{route('patient', $p)}}">View</a></td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">
                    {{ $patients->links('components.pagination') }}
                </td>
            </tr>
        </tfoot>
    </table>
</div>

@push('scripts')
    <script>
        $(() => {
            // $("table").DataTable({
            // });
        })
    </script>
@endpush
