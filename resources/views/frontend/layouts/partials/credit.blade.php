@php
    function getInitials($name) {
        $words = explode(' ', $name);
        $initials = '';

        foreach ($words as $word) {
            $initials .= strtoupper($word[0]);
        }

        return $initials;
    }

    $user = Auth::user();
    $nameLogo = '';

    if ($user->role == 'admin') {
        $nameLogo = 'A';
        $userName = 'Admin';
    } elseif ($user->role == 'grower') {
        $userName = $user->grower ? $user->grower->name : 'Grower name not available';
        $nameLogo = $user->grower ? getInitials($user->grower->name) : 'GN';
    } elseif ($user->role == 'breeder') {
        $userName = $user->breeder ? $user->breeder->name : 'Breeder name not available';
        $nameLogo = $user->breeder ? getInitials($user->breeder->name) : 'BN';
    } else {
        $userName = 'Role not specified';
    }
@endphp
<div class="name-logo"><span>{{$nameLogo}}</span></div>
<div class="user">
    <h5>Welcome Back!</h5>
    <h2>
        {{ $userName }}
    </h2>
</div>
