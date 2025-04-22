@extends('layouts.app')
@section('title', 'Dashboard')

<style>
    /* Base styling */
    .dashboard-container {
        position: relative;
    }
    
    /* Better text contrast for cards */
    .feature-card h3 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 8px;
        color: #ffffff; /* Bright white for better contrast */
        text-shadow: 0 1px 2px rgba(0,0,0,0.1); /* Text shadow for better readability */
    }
    
    .feature-card p {
        font-size: 15px;
        line-height: 1.5;
        color: rgba(255, 255, 255, 0.9) !important; /* Brighter text with important to override */
        margin-bottom: 16px;
    }
    
    .feature-card .access-now {
        background: rgba(255, 255, 255, 0.15);
        padding: 8px 16px;
        border-radius: 20px;
        display: inline-flex;
        align-items: center;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .feature-card:hover .access-now {
        background: rgba(255, 255, 255, 0.25);
        transform: translateX(5px);
    }
    
    /* Card background with increased opacity for visibility */
    .card-background {
        opacity: 0.15 !important; /* Increased from 0.2 for better visibility */
    }
    
    .feature-card:hover .card-background {
        opacity: 0.3 !important; /* Increased from 0.25 for better hover effect */
    }
    
    /* Stats card styling */
    .stat-card {
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        border-radius: 16px;
        overflow: hidden;
    }
    
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }
    
    .stat-title {
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        color: #6c757d;
        margin-bottom: 5px;
    }
    
    .stat-value {
        font-size: 24px;
        font-weight: 700;
        color: #333;
        margin-bottom: 0;
    }
    
    .stat-label {
        font-size: 13px;
        color: #6c757d;
    }
    
    /* Icon container with increased size */
    .feature-icon {
        width: 60px !important;
        height: 60px !important;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.18);
        backdrop-filter: blur(5px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .feature-icon i {
        font-size: 24px;
        color: white;
    }
    
    /* Welcome panel styling */
    .welcome-panel {
        background: #f8f9ff;
        border-radius: 16px;
        margin-bottom: 24px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        overflow: hidden;
    }
    
    .avatar-large {
        width: 64px;
        height: 64px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: linear-gradient(135deg, #8b5cf6, #a78bfa);
        font-size: 26px;
        color: white;
        font-weight: 700;
        box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
    }
    
    /* Enhanced animations */
    @keyframes float {
        0% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-10px) rotate(5deg); }
        100% { transform: translateY(0) rotate(0deg); }
    }
    
    .bg-shape {
        position: absolute;
        width: 300px;
        height: 300px;
        border-radius: 50%;
        background: linear-gradient(45deg, rgba(139, 92, 246, 0.1), rgba(139, 92, 246, 0.05));
        filter: blur(80px);
        z-index: -1;
        animation: float 10s ease-in-out infinite;
    }
    
    .bg-shape:nth-child(1) {
        top: -100px;
        right: 10%;
    }
    
    .bg-shape:nth-child(2) {
        bottom: 10%;
        left: 5%;
        width: 250px;
        height: 250px;
        background: linear-gradient(45deg, rgba(255, 191, 0, 0.05), rgba(255, 191, 0, 0.02));
        animation-delay: 2s;
    }
    
    /* Richer gradients for feature cards */
    .bg-gradient-purple {
        background: linear-gradient(45deg, #8b5cf6, #a78bfa) !important;
    }
    
    .bg-gradient-amber {
        background: linear-gradient(45deg, #d97706, #fbbf24) !important;
    }
    
    .bg-gradient-cyan {
        background: linear-gradient(45deg, #0891b2, #22d3ee) !important;
    }
    
    /* Table styling */
    .modern-table {
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
    }
    
    .modern-table th {
        font-weight: 600;
        padding: 16px;
        background-color: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
    }
    
    .modern-table td {
        padding: 16px;
        border-bottom: 1px solid #f1f1f1;
        vertical-align: middle;
    }
    
    .modern-table tr {
        transition: all 0.2s ease;
    }
    
    .modern-table tr:hover {
        background-color: #f8f9ff;
    }
</style>

@section('content')
<div class="dashboard-container">
    <!-- Animated background shapes -->
    <div class="bg-shape"></div>
    <div class="bg-shape"></div>

    <!-- Header with title -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                    <h2 class="mb-0 welcome-text">Dashboard</h2>
                    <p class="text-muted mt-1">Sistem Informasi Tugas Akhir</p>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">SITA</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content in 2-Column Layout -->
    <div class="row">
        <!-- Left Column -->
        <div class="col-lg-5">
            <!-- Welcome Panel -->
            <div class="welcome-panel">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar-large me-4">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </div>
                        <div>
                            <h5 class="text-muted mb-1">Selamat Datang,</h5>
                            <h3 class="mb-2 fw-bold">{{ auth()->user()->name }}</h3>
                            <p class="mb-0">
                                @if($periodeTA)
                                    <span class="active-period">{{ $periodeTA->semester }} {{ $periodeTA->periode }}</span>
                                @else 
                                    <span class="text-muted">Tidak ada periode yang aktif saat ini.</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu Cards Stacked Vertically -->
            <div class="mt-4">
                <!-- Bimbingan Card -->
                <a href="{{ route('data-pengajuan:bimbingan') }}" class="text-decoration-none mb-4 d-block">
                    <div class="feature-card bg-gradient-purple">
                        <div class="card-background bg-bimbingan"></div>
                        <div class="card-body py-4 px-4">
                            <div class="feature-icon">
                                <i class="fas fa-book"></i>
                            </div>
                            <h3>Bimbingan</h3>
                            <p>Masukkan hasil bimbingan dengan Dosen Pembimbing Anda di sini!</p>
                            <div class="access-now text-white">
                                <span>Akses Sekarang</span>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Seminar Proposal Card -->
                <a href="{{ route('data-pengajuan:seminar-proposal') }}" class="text-decoration-none mb-4 d-block">
                    <div class="feature-card bg-gradient-amber">
                        <div class="card-background bg-sempro"></div>
                        <div class="card-body py-4 px-4">
                            <div class="feature-icon">
                                <i class="fas fa-book-reader"></i>
                            </div>
                            <h3>Seminar Proposal</h3>
                            <p>Sudah diizinkan seminar, nih? Daftar Seminar Proposal di sini!</p>
                            <div class="access-now text-white">
                                <span>Akses Sekarang</span>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Sidang TA Card -->
                <a href="{{ route('data-pengajuan:sidang-ta') }}" class="text-decoration-none d-block">
                    <div class="feature-card bg-gradient-cyan">
                        <div class="card-background bg-sidang"></div>
                        <div class="card-body py-4 px-4">
                            <div class="feature-icon">
                                <i class="fas fa-user-graduate"></i>
                            </div>
                            <h3>Sidang TA</h3>
                            <p>Wow, kamu sudah di tahap ini. Ayo, maju ke Sidang Tugas Akhir!</p>
                            <div class="access-now text-white">
                                <span>Akses Sekarang</span>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-7">
            <!-- Stats in 2x2 Grid -->
            <div class="row mb-4">
                <!-- Peserta TA Stat -->
                <div class="col-md-6 mb-4">
                    <div class="card stat-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div style="width: 48px; height: 48px; background: linear-gradient(45deg, #8b5cf6, #a78bfa); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-user-graduate text-white"></i>
                                </div>
                                <div>
                                    <div class="stat-title">Peserta TA</div>
                                    <div class="d-flex align-items-baseline">
                                        <div class="stat-value">{{ $mahasiswa }}</div>
                                        <div class="stat-label ms-2">Mahasiswa</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Seminar Proposal Stat -->
                <div class="col-md-6 mb-4">
                    <div class="card stat-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div style="width: 48px; height: 48px; background: linear-gradient(45deg, #d97706, #fbbf24); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-file-alt text-white"></i>
                                </div>
                                <div>
                                    <div class="stat-title">Seminar Proposal</div>
                                    <div class="d-flex align-items-baseline">
                                        <div class="stat-value">{{ $sempro }}</div>
                                        <div class="stat-label ms-2">Mahasiswa</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidang TA Stat -->
                <div class="col-md-6 mb-4 mb-md-0">
                    <div class="card stat-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div style="width: 48px; height: 48px; background: linear-gradient(45deg, #0891b2, #22d3ee); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-medal text-white"></i>
                                </div>
                                <div>
                                    <div class="stat-title">Sidang TA</div>
                                    <div class="d-flex align-items-baseline">
                                        <div class="stat-value">{{ $sidang }}</div>
                                        <div class="stat-label ms-2">Mahasiswa</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Dosen Stat -->
                <div class="col-md-6">
                    <div class="card stat-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div style="width: 48px; height: 48px; background: linear-gradient(45deg, #4f46e5, #818cf8); border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                                    <i class="fas fa-chalkboard-teacher text-white"></i>
                                </div>
                                <div>
                                    <div class="stat-title">Dosen</div>
                                    <div class="d-flex align-items-baseline">
                                        <div class="stat-value">{{ $dosen }}</div>
                                        <div class="stat-label ms-2">Dosen</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Referensi Table -->
            <div class="card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold mb-0">Referensi Topik Tugas Akhir</h4>
                        <button class="btn btn-sm btn-light py-1 px-2 rounded-3">
                            <i class="fas fa-ellipsis-v"></i>
                        </button>
                    </div>
                    <div class="table-responsive">
                        <table class="modern-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Bidang Minat</th>
                                    <th>Judul/Topik</th>
                                    <th>Dosen Pembimbing</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($referensis as $referensi)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>
                                        <span class="badge bg-light text-dark">{{ $referensi->bidang_minat }}</span>
                                    </td>
                                    <td>{{ $referensi->judul }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div style="width: 32px; height: 32px; border-radius: 50%; background: linear-gradient(135deg, #8b5cf6, #a78bfa); display: flex; align-items: center; justify-content: center; color: white; font-size: 12px; margin-right: 10px;">
                                                {{ strtoupper(substr($referensi->user->name, 0, 1)) }}
                                            </div>
                                            <span>{{ $referensi->user->name }}</span>
                                        </div>
                                    </td>
                                </tr>
                                @empty 
                                <tr>
                                    <td colspan="4" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="fas fa-folder-open mb-3" style="font-size: 3rem; opacity: 0.5;"></i>
                                            <p>Belum ada data referensi tugas akhir</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('dashboard')
<script src="https://cdn.jsdelivr.net/npm/gsap@3.11.4/dist/gsap.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof gsap !== 'undefined') {
            // GSAP entrance animations
            gsap.from(".welcome-panel", {
                duration: 0.7,
                opacity: 0,
                y: 20,
                ease: "power2.out"
            });
            
            gsap.from(".feature-card", {
                duration: 0.7,
                opacity: 0,
                y: 20,
                stagger: 0.15,
                delay: 0.2,
                ease: "power2.out"
            });
            
            gsap.from(".stat-card", {
                duration: 0.5,
                opacity: 0,
                y: 15,
                stagger: 0.1,
                delay: 0.3,
                ease: "power1.out"
            });
            
            gsap.from(".card:not(.feature-card):not(.stat-card)", {
                duration: 0.7,
                opacity: 0,
                y: 20,
                delay: 0.5,
                ease: "power2.out"
            });
            
            // Table rows animation
            gsap.from("table tr", {
                duration: 0.3,
                opacity: 0,
                y: 10,
                stagger: 0.05,
                delay: 0.7,
                ease: "power1.out"
            });
            
            // Card hover effects
            const featureCards = document.querySelectorAll('.feature-card');
            featureCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    gsap.to(this, {
                        scale: 1.02,
                        duration: 0.3,
                        ease: "power1.out"
                    });
                    gsap.to(this.querySelector('.card-background'), {
                        opacity: 0.35,
                        scale: 1.1,
                        duration: 0.5,
                        ease: "power1.out"
                    });
                });
                
                card.addEventListener('mouseleave', function() {
                    gsap.to(this, {
                        scale: 1,
                        duration: 0.3,
                        ease: "power1.out"
                    });
                    gsap.to(this.querySelector('.card-background'), {
                        opacity: 0.15,
                        scale: 1,
                        duration: 0.5,
                        ease: "power1.out"
                    });
                });
            });
            
            // Stats card hover effects
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    gsap.to(this, {
                        y: -5,
                        boxShadow: "0 8px 20px rgba(0,0,0,0.1)",
                        duration: 0.3,
                        ease: "power1.out"
                    });
                });
                
                card.addEventListener('mouseleave', function() {
                    gsap.to(this, {
                        y: 0,
                        boxShadow: "0 4px 12px rgba(0,0,0,0.05)",
                        duration: 0.3,
                        ease: "power1.out"
                    });
                });
            });
        }
    });
</script>
@endpush