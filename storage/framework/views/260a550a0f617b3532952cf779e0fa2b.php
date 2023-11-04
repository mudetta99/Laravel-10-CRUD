




<style>
    .view_image:hover{
        scale: 2.1;
        margin-left: 75px; 
        margin-top: 55px; 
    }

    .head{
        text-align: center;
    }
    .head:hover{
        letter-spacing: 2px;
    }
</style>


<?php $__env->startSection('title'); ?>
    All Products
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    <h1 class="head">All Products </h1> <br>

    

    <?php if( $message = Session::get('success')): ?>
        <div class="alert alert-success" role="alert">
            <?php echo e($message); ?>

        </div>
    <?php endif; ?>

    <table class="table table-hover">

        <thead>

          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Details</th>
            <th>Image</th>
            <th>Actions</th>
          </tr>

        </thead>

        <tbody>
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
          <tr>
            <td><?php echo e($item -> id); ?></td>
            <td><?php echo e($item -> name); ?></td>
            <td><?php echo e($item -> details); ?></td>
            <td><img width="250px" src="/images/<?php echo e($item->image); ?>" alt="" srcset=""></td>
            <td>
                <?php if(auth()->guard()->check()): ?>
                    
                <form action="<?php echo e(route('products.destroy', $item -> id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>

                                <!-- Button trigger modal -->
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal <?php echo e($item -> id); ?>">
                Delete
            </button>
            
            <!-- Modal -->
            <div class="modal fade" id="exampleModal <?php echo e($item -> id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title text text-danger" id="exampleModalLabel">Delete <?php echo e($item -> name); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    Are You Sure about Deleting <p class="text text-danger"><?php echo $item -> name; ?> ?</p>
                    <img class="view_image" src="/images/<?php echo e($item -> image); ?>" width="150px" >
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>

                    </div>
                </div>
                </div>
            </div>


                </form>

                <a class="btn btn-primary" href="<?php echo e(route('products.edit', $item -> id)); ?>">Edit</a>

                <?php endif; ?>

                <a class="btn btn-info"    href="<?php echo e(route('products.show', $item -> id)); ?>">Show</a>

            </td>

          </tr>


            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        
        </tbody>

      </table>

      <?php echo $products -> links(); ?>

    
<?php $__env->stopSection(); ?>
<?php echo $__env->make('products.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\DELL\Desktop\products\resources\views/products/index.blade.php ENDPATH**/ ?>