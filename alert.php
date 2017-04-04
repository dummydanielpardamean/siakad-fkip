<?php if ( ! empty($errors)): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"
                aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <ul>
			<?php foreach ( $errors as $error ): ?>
                <li><?= $error ?></li>
			<?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
<?php if ( ! empty($success)): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"
                aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
        <ul>
			<?php foreach ( $success as $x ): ?>
                <li><?= $x ?></li>
			<?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>