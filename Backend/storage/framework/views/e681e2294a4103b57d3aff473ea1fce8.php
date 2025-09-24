<?php if (isset($component)) { $__componentOriginalaa758e6a82983efcbf593f765e026bd9 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalaa758e6a82983efcbf593f765e026bd9 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => $__env->getContainer()->make(Illuminate\View\Factory::class)->make('mail::message'),'data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('mail::message'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
	
	<p align="center" style="margin:0 0 16px">
		<img src="<?php echo new \Illuminate\Support\EncodedHtmlString(asset('images/email-hero.jpg')); ?>" alt="" width="600"
			style="max-width:100%; border-radius:12px; display:block;">
	</p>

	# New Contact
	Name: <?php echo new \Illuminate\Support\EncodedHtmlString($m->name); ?>


	Email: <?php echo new \Illuminate\Support\EncodedHtmlString($m->address); ?>


	Subject: <?php echo new \Illuminate\Support\EncodedHtmlString($m->subject ?? '—'); ?>


	Message:
	<?php echo new \Illuminate\Support\EncodedHtmlString($m->message); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalaa758e6a82983efcbf593f765e026bd9)): ?>
<?php $attributes = $__attributesOriginalaa758e6a82983efcbf593f765e026bd9; ?>
<?php unset($__attributesOriginalaa758e6a82983efcbf593f765e026bd9); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalaa758e6a82983efcbf593f765e026bd9)): ?>
<?php $component = $__componentOriginalaa758e6a82983efcbf593f765e026bd9; ?>
<?php unset($__componentOriginalaa758e6a82983efcbf593f765e026bd9); ?>
<?php endif; ?><?php /**PATH E:\Trabalho\MySite\Backend\resources\views/mail/contact_notification.blade.php ENDPATH**/ ?>