  <!--Add Modal -->
  <div wire:ignore.self class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="studentModalLabel">Create Student</h1>
          <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form wire:submit.prevent="saveStudent">
        <div class="modal-body">
            <div class="mb-3">
                <label>Student Name</label>
                <input type="text" wire:model.lazy='name' class="form-control">
                @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label>Student Email</label>
                <input type="text"  wire:model.lazy='email' class="form-control">
                @error('email') <span class="error text-danger" >{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label>Course</label>
                <input type="text"  wire:model.lazy='course' class="form-control">
                @error('course') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label>Images</label>
                <input type="file"  wire:model.lazy='images' multiple class="form-control">
                @error('images.*') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button wire:loading.remove type="submit"  class="btn btn-primary">Save</button>
          <button class="btn btn-primary" wire:loading>saving....</button>
        </div>
        </form>
      </div>
    </div>
  </div>

    <!-- edit Modal -->
    <div wire:ignore.self class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="editStudentModalLabel">Edit Student</h1>
              <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="updateStudent">
            <div class="modal-body">
                <div class="mb-3">
                    <label>Student Name</label>
                    <input type="text" wire:model='name' class="form-control">
                    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label>Student Email</label>
                    <input type="text"  wire:model='email' class="form-control">
                    @error('email') <span class="error text-danger" >{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label>Course</label>
                    <input type="text"  wire:model='course' class="form-control">
                    @error('course') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
            </form>
          </div>
        </div>
      </div>


       <!-- delete Modal -->
    <div wire:ignore.self class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="deleteStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="deleteStudentModalLabel">Edit Student</h1>
              <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="destroyStudent">
            <div class="modal-body">
                <h4>Are you sure ?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" wire:click="closeModal" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary">Delete</button>
            </div>
            </form>
          </div>
        </div>
      </div>
