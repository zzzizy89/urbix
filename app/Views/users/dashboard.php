<!-- 
                                                         
,--. ,--.                ,--------.            ,--.      
|  .'   / ,---. ,--. ,--.'--.  .--',---.  ,---.|  ,---.  
|  .   ' | .-. : \  '  /    |  |  | .-. :| .--'|  .-.  | 
|  |\   \\   --.  \   '     |  |  \   --.\ `--.|  | |  | 
`--' '--' `----'.-'  /      `--'   `----' `---'`--' `--' 
                `---'                                     -->

                <title>Your Profile</title>

<h1>Welcome <?=session('user')->name;?></h1>

<h2>Your Stats</h2>


<div class="btn-box btns">

<a href="<?=base_url('home')?>"><button type="submit" class="btn" >Inicio</button></a>

</div>

<div class="btn-box btns">

<a href="<?=base_url('logout')?>"><button type="submit" class="btn" >Logout</button></a>

</div>
