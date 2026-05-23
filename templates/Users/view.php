<div class="container mt-5">

<div class="card">

<div class="card-body">

<h2>

My Profile

</h2>

<hr>

<p>

<strong>Name:</strong>

<?= h(
$user->name
) ?>

</p>

<p>

<strong>Email:</strong>

<?= h(
$user->email
) ?>

</p>

<p>

<strong>Role:</strong>

<?= h(
$user->role
) ?>

</p>

<p>

<strong>Created:</strong>

<?= h(
$user->created
) ?>

</p>

<a

href="<?= $this->Url->build([
'action'=>'edit'
]) ?>"

class="btn btn-warning">

Edit Profile

</a>

<?= $this->Form->postLink(
'Delete Account',
[
'action'=>'delete'
],
[
'class'=>'btn btn-danger',

'confirm'=>
'Delete account?'
]
) ?>

</div>

</div>

</div>