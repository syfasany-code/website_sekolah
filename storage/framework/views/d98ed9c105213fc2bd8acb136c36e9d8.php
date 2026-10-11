<?php $__env->startSection('title', 'Kelola Berita - SMAN 1 Yogyakarta'); ?>

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">

            <div class="card shadow-sm border-0 rounded-3">

                <!-- HEADER -->
                <div class="card-header bg-white d-flex justify-content-between align-items-center">
                    <h3 class="mb-0">Berita</h3>
                    <a href="<?php echo e(route('admin.berita.addEdit')); ?>" class="btn btn-primary btn-sm shadow-sm">
                        + Tambah Berita
                    </a>
                </div>

                <!-- BODY -->
                <div class="card-body">
                    <div class="table-responsive">

                        <table class="table table-bordered table-striped datatable" style="width:100%">

                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Isi</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Gambar</th>
                                    <th>Penulis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $berita; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>

                                    <td class="text-muted"><?php echo e($index + 1); ?></td>

                                    <!-- JUDUL -->
                                    <td>
                                        <div class="fw-semibold">
                                            <?php echo e($item->judul); ?>

                                        </div>
                                    </td>

                                    <!-- ISI DIPOTONG -->
                                    <td class="text-muted">
                                        <?php echo e(Str::limit($item->isi, 50)); ?>

                                    </td>

                                    <!-- TANGGAL -->
                                    <td>
                                        <span class="badge bg-primary-subtle text-primary px-3 py-2">
                                            <?php echo e(\Carbon\Carbon::parse($item->tanggal)->format('d M Y')); ?>

                                        </span>
                                    </td>

                                    <!-- STATUS -->
                                    <td>
                                        <span class="badge
                                            <?php echo e($item->status == 'publish' ? 'bg-success' : 'bg-secondary'); ?>">
                                            <?php echo e(ucfirst($item->status)); ?>

                                        </span>
                                    </td>

                                    <!-- GAMBAR -->
                                    <td>
                                        <?php if($item->gambar): ?>
                                            <img src="<?php echo e(asset('storage/berita/' . $item->gambar)); ?>"
                                                 width="70"
                                                 class="rounded-3 shadow-sm">
                                        <?php else: ?>
                                            <span class="text-muted">-</span>
                                        <?php endif; ?>
                                    </td>

                                    <!-- PENULIS -->
                                    <td>
                                        <?php echo e($item->user->name ?? '-'); ?>

                                    </td>

                                    <!-- AKSI -->
                                    <td class="text-center">
                                        <div class="btn-aksi-group" role="group">
                                            <!-- Tombol Detail selalu bisa dilihat oleh siapa saja -->
                                            <a href="<?php echo e(route('admin.berita.show', Crypt::encrypt($item->id_berita))); ?>" class="btn btn-info btn-sm text-white" title="Detail Berita" aria-label="Detail Berita">
                                                <i class="mdi mdi-eye"></i> <span class="d-none d-md-inline ms-1">Detail</span>
                                            </a>

                                            <!-- Tombol Edit & Hapus HANYA MUNCUL jika Admin ATAU Pemilik berita (Operator yang bersangkutan) -->
                                            <?php if(Auth::user()->role == 'admin' || $item->id_user == Auth::id()): ?>
                                                <a href="<?php echo e(route('admin.berita.addEdit', Crypt::encrypt($item->id_berita))); ?>" class="btn btn-warning btn-sm text-white" title="Edit Berita" aria-label="Edit Berita">
                                                    <i class="mdi mdi-pencil"></i> <span class="d-none d-md-inline ms-1">Edit</span>
                                                </a>

                                                <form action="<?php echo e(route('admin.berita.delete', Crypt::encrypt($item->id_berita))); ?>"
                                                    method="POST" class="d-inline"
                                                    onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus Berita"
                                                        aria-label="Hapus Berita">
                                                        <i class="mdi mdi-delete"></i> <span
                                                            class="d-none d-md-inline ms-1">Hapus</span>
                                                    </button>
                                                </form>
                                            <?php endif; ?>
                                        </div>
                                    </td>

                                </tr>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="8" class="text-center text-muted py-4">
                                        Belum ada data berita
                                    </td>
                                </tr>
                                <?php endif; ?>
                            </tbody>

                        </table>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\website_sekolah\resources\views/admin/berita/index.blade.php ENDPATH**/ ?>