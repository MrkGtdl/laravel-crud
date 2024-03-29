
<style>
    .pull-right, .footer{
    display: flex;
    justify-content: space-between;
    margin-top: 30px;
    }

    .pagination a {
    color: black;
    float: left;
    padding: 8px 16px;
    text-decoration: none;
    }

    #importForm{
    display:none;
    }

</style>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left ">
                <a href="http://127.0.0.1:8000/products" style="text-decoration: none;"><h2 class="text-black-50">LARAVEL CRUD</h2></a>
            </div>
        </div>
    </div>

    <div class="pull-right">
        <div>
            <a class="btn btn-warning" href="<?php echo e(route('products.create')); ?>" style="height: fit-content;"> <i class="fa-solid fa-plus"></i> Create</a>
            <a class="btn btn-warning" href="<?php echo e(route('products.export')); ?>" style="height: fit-content;"> <i class="fa-solid fa-file-export"></i> Export</a>
            <a class="btn btn-warning" onclick="showDiv()" style="height: fit-content;"> <i class="fa-solid fa-file-import"></i> Import</a>

            <form id="importForm" action="<?php echo e(route('products.import')); ?>" method="POST" enctype="multipart/form-data" style="display:none;">
                <?php echo csrf_field(); ?>
                <div class="input-group mb-3">
                    <input type="file" name="file" class="form-control">
                    <label class="input-group-text" for="inputGroupFile02">import</label>
                    <button  id="inputGroupFile02" class="btn btn-warning" style="display:none;"><i class="fa-solid fa-file-import"></i>Import</button>
                </div>
            </form>
        </div>

                <div class="mt-1 mb-2">
                    <div class="relative max-w-xs">
                        <form action="<?php echo e(route('products.index')); ?>" method="GET">
                            <input type="text" name="s"
                                class="block w-full pl-10 text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400"
                                placeholder="Search..." />
                        </form>
                    </div>
                </div>
            </div>

    <?php if($message = Session::get('success')): ?>
        <div class="alert alert-success alert-dismissible">
        <a href="http://127.0.0.1:8000/products" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p><?php echo e($message); ?></p>
        </div>
    <?php endif; ?>
   
    <table class="table table-bordered table-striped table-hover" style="border-color: gray;">
        <tr class="bg-warning">
            <th width="155px">Action</th>
            <th>Id</th>
            <th>Title</th>
            <th>Details</th>

        </tr>
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td>
                <form action="<?php echo e(route('products.destroy',$product->id)); ?>" method="POST">
   
                    <a class="btn btn-success" href="<?php echo e(route('products.show',$product->id)); ?>"><i class="fa-solid fa-eye"></i></a>
    
                    <a class="btn btn-primary" href="<?php echo e(route('products.edit',$product->id)); ?>"><i class="fa-solid fa-pen"></i></a>
   
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
      
                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                </form>
            </td>
            <td><?php echo e(++$i); ?></td>
            <td><?php echo e($product->productName); ?></td>
            <td><?php echo e($product->productDescription); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
    <!-- footer -->
    <div class="footer">
    <small style="display: flex;justify-content: center;">Showing <?php echo e($products->firstItem()); ?> - <?php echo e($products->lastItem()); ?> of <?php echo e($products->total()); ?> entries</small>
    <span><?php echo $products->links(); ?></span>
    </div>

      
<?php $__env->stopSection(); ?>
<script>
function showDiv() {
    var toggleImport = document.getElementById("importForm");

    if (toggleImport.style.display === "none") {
        toggleImport.style.display = "block";
    } else {
        toggleImport.style.display = "none";
    }
}
</script>
<?php echo $__env->make('products.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\laravel-crud\resources\views/products/index.blade.php ENDPATH**/ ?>