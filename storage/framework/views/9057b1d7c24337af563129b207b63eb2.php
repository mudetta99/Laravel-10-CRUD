



<style>
    form button{
        width: 100%;
        border-radius: 5px;
    }

    form button:hover{
        width: 100%;
        border-radius: 25px;
        color: #0b0a41;
    }
</style>

<?php $__env->startSection('title'); ?>
    Create Product
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    
<a href="<?php echo e(route('products.index')); ?>">
    <button type="button" class="btn btn-primary">All Products</button>
</a>

<?php if($errors -> any()): ?>

    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors -> all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($item); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>

    </div>
    
<?php endif; ?>


<div class="container p-5">

<form action="<?php echo e(route('products.store')); ?>" method="post" enctype="multipart/form-data">
<?php echo csrf_field(); ?>
    <div class="mb-3">
        <label for="" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Enter name">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Details</label>
        <textarea class="form-control" name="details" placeholder="Enter description"></textarea>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Image</label>
        <input type="file" class="form-control" name="image">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>

</form>
    

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('products.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\products\resources\views/products/create.blade.php ENDPATH**/ ?>