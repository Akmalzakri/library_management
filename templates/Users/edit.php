<div class="container mt-5">

<div class="card">

<div class="card-body">

<h2>

Edit Profile

</h2>

<?= $this->Form->create(
$user
) ?>

<?= $this->Form->control(
'name'
) ?>

<?= $this->Form->control(
'email'
) ?>

<?= $this->Form->control(
'contact_number'
) ?>

<?= $this->Form->control(
'password'
) ?>

<?= $this->Form->button(
'Save',
[
'class'=>'btn btn-success'
]
) ?>

<?= $this->Form->end() ?>

</div>

</div>

</div>