<form action="{{ route('referrals.store') }}" method="POST">
    @csrf
    <label for="email">Enter Email:</label>
    <input type="email" name="email" id="email" required>
    <button type="submit">Send Invite</button>
</form>
