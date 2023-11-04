

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


<div class="container p-5">


    <div class="mb-3">
        <label for="" class="form-label">Product's Name</label>
        <input type="text" class="form-control" name="name" value = <?php echo e($product -> name); ?> disabled>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Product's Details</label>
        <textarea class="form-control" name="details" disabled>
            <?php echo e($product -> details); ?>

        </textarea>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Product's Image</label><br>

        <img src="/images/<?php echo e($product -> image); ?>" width="300px" style="margin: 5px">
  
    </div>

    

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('products.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\products\resources\views/products/show.blade.php ENDPATH**/ ?>