<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        <div class="text-center justify-center mb-10">
            <h1 class="font-bold text-3xl">PENDAFTARAN AKUN</h1>
        </div>
        @csrf

        <!-- Kategori Pemohon DRPDOWN -->
        <div>
            <x-input-label for="id_kategori" :value="__('Kategori Pemohon')" />
            <select id="id_kategori" name="id_kategori" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" required>
                <option value="">Pilih Kategori</option>
                @foreach($kategori_pemohon as $kategori)
                <option value="{{ $kategori->id_kategori }}" {{ old('id_kategori') == $kategori->id_kategori ? 'selected' : '' }}>
                    {{ $kategori->nama_kategori }}
                </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('id_kategori')" class="mt-2" />
        </div>

        <!-- Form Pemohon -->
        <x-text-input id="no_pendaftaran" class="block mt-1 w-full" type="hidden" name="no_pendaftaran" :value="$newNoPendaftaran" required readonly />

        <div class="mt-3">
            <x-input-label for="nama" :value="__('Nama')" />
            <x-text-input id="nama" class="block mt-1 w-full" type="text" name="nama" :value="old('nama')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('nama')" class="mt-2" />
        </div>

        <!-- NIK -->
        <div class="mt-3">
            <x-input-label for="nik" :value="__('NIK')" />
            <x-text-input id="nik" class="block mt-1 w-full" type="text" name="nik" :value="old('nik')" required autofocus autocomplete="nik" />
            <x-input-error :messages="$errors->get('nik')" class="mt-2" />
        </div>

        <!-- Alamat -->
        <div class="mt-3">
            <x-input-label for="alamat" :value="__('Alamat')" />
            <textarea id="alamat" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" name="alamat" required>{{ old('alamat') }}</textarea>
            <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
        </div>

        <!-- Nomor Telepon -->
        <div class="mt-3">
            <x-input-label for="no_tlp" :value="__('Nomor Telepon')" />
            <x-text-input id="no_tlp" class="block mt-1 w-full" type="text" name="no_tlp" :value="old('no_tlp')" required autocomplete="tel" />
            <x-input-error :messages="$errors->get('no_tlp')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-3">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Pekerjaan -->
        <div class="mt-3">
            <x-input-label for="pekerjaan" :value="__('Pekerjaan')" />
            <x-text-input id="pekerjaan" class="block mt-1 w-full" type="text" name="pekerjaan" :value="old('pekerjaan')" required />
            <x-input-error :messages="$errors->get('pekerjaan')" class="mt-2" />
        </div>

        <!-- File KTP -->
        <div class="mt-3">
            <x-input-label for="file_ktp" :value="__('Upload KTP (PDF/PNG)')" />
            <x-text-input id="file_ktp" class="block mt-1 w-full" type="file" name="file_ktp" accept=".pdf,.png" required />
            <x-input-error :messages="$errors->get('file_ktp')" class="mt-2" />
        </div>

        <!-- Form Badan Hukum (Tersembunyi Awal) -->
        <div id="badan_hukum_fields" class="mt-3" style="display:none;">
            <h3 class="font-bold text-xl mb-3">Data Badan Hukum</h3>

            <!-- Nama Kuasa -->
            <div class="mt-3">
                <x-input-label for="nama_kuasa" :value="__('Nama Kuasa')" />
                <x-text-input id="nama_kuasa" class="block mt-1 w-full" type="text" name="nama_kuasa" :value="old('nama_kuasa')" autocomplete="name" />
                <x-input-error :messages="$errors->get('nama_kuasa')" class="mt-2" />
            </div>

            <!-- Alamat Kuasa -->
            <div class="mt-3">
                <x-input-label for="alamat_kuasa" :value="__('Alamat Kuasa')" />
                <textarea id="alamat_kuasa" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" name="alamat_kuasa">{{ old('alamat_kuasa') }}</textarea>
                <x-input-error :messages="$errors->get('alamat_kuasa')" class="mt-2" />
            </div>

            <!-- No Telepon Kuasa -->
            <div class="mt-3">
                <x-input-label for="no_tlp_kuasa" :value="__('Nomor Telepon Kuasa')" />
                <x-text-input id="no_tlp_kuasa" class="block mt-1 w-full" type="text" name="no_tlp_kuasa" :value="old('no_tlp_kuasa')" autocomplete="tel" />
                <x-input-error :messages="$errors->get('no_tlp_kuasa')" class="mt-2" />
            </div>

            <!-- SK Badan Hukum -->
            <div class="mt-3">
                <x-input-label for="sk_badanhukum" :value="__('Upload SK Badan Hukum (PDF)')" />
                <x-text-input id="sk_badanhukum" class="block mt-1 w-full" type="file" name="sk_badanhukum" accept=".pdf" />
                <x-input-error :messages="$errors->get('sk_badanhukum')" class="mt-2" />
            </div>
        </div>

        <!-- Password -->
        <div class="mt-3">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        document.getElementById('id_kategori').addEventListener('change', function() {
            var kategori = this.value;
            var badanHukumFields = document.getElementById('badan_hukum_fields');

            // If "Badan Hukum" is selected (assume ID is 2 for Badan Hukum)
            if (kategori == 2) {
                badanHukumFields.style.display = 'block';
            } else {
                badanHukumFields.style.display = 'none';
            }
        });
    </script>
</x-guest-layout>