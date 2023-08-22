<!-- 
                                                         
,--. ,--.                ,--------.            ,--.      
|  .'   / ,---. ,--. ,--.'--.  .--',---.  ,---.|  ,---.  
|  .   ' | .-. : \  '  /    |  |  | .-. :| .--'|  .-.  | 
|  |\   \\   --.  \   '     |  |  \   --.\ `--.|  | |  | 
`--' '--' `----'.-'  /      `--'   `----' `---'`--' `--' 
                `---'                                     -->
                <title>Your Profile</title>

<h1>Welcome <?= session('user')->name; ?></h1>

<h2>Your Stats</h2>
<div class="user-stats">
    <p><strong>Name:</strong> <?= session('user')->name; ?></p>
    <p><strong>Email:</strong> <?= session('user')->email; ?></p>
</div>

<div class="user-menu">
    <h2>User Menu</h2>
    <form action="<?= base_url('update') ?>" method="post">
        <label for="new-username">New Username:</label>
        <input type="text" id="new-username" name="new_username" required>
        <button type="submit">Change Username</button>
    </form>
    
    <!-- Add image upload form here -->
</div>

<div class="btn-box btns">
    <a href="<?= base_url('home') ?>"><button type="submit" class="btn">Inicio</button></a>
</div>

<div class="btn-box btns">
    <a href="<?= base_url('logout') ?>"><button type="submit" class="btn">Logout</button></a>
</div>

