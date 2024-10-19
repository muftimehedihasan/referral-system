<table>
    <thead>
        <tr>
            <th>Referrer</th>
            <th>Email</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach($referrals as $referral)
        <tr>
            <td>{{ $referral->referrer->name }}</td>
            <td>{{ $referral->email }}</td>
            <td>{{ $referral->is_registered ? 'Registered' : 'Pending' }}</td>
            <td>{{ $referral->created_at->format('Y-m-d') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
