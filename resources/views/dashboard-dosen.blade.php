@extends('layouts.app')
@section('title', 'Dashboard')

<style>
    /* Base styling and modernized elements */
    .dashboard-container {
        position: relative;
        overflow-x: hidden;
    }
    
    /* Enhanced text styling */
    .welcome-text {
        font-size: 32px;
        font-weight: 700;
        background: linear-gradient(45deg, #3a7bd5, #8b5cf6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 5px;
    }
    
    /* Improved card styling with elevation */
    .feature-card {
        position: relative;
        overflow: hidden;
        min-height: 180px;
        border-radius: 20px;
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
    }
    
    .feature-card h3 {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 8px;
        color: #ffffff;
        text-shadow: 0 1px 2px rgba(0,0,0,0.12);
    }
    
    .feature-card p {
        font-size: 15px;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.95) !important;
        margin-bottom: 20px;
    }
    
    .feature-card .access-now {
        background: rgba(255, 255, 255, 0.18);
        padding: 10px 20px;
        border-radius: 30px;
        display: inline-flex;
        align-items: center;
        font-weight: 600;
        transition: all 0.4s ease;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    
    .feature-card:hover .access-now {
        background: rgba(255, 255, 255, 0.28);
        transform: translateX(5px);
    }
    
    /* Enhanced background elements */
    .card-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        opacity: 0.15;
        transition: all 0.5s ease;
        transform-origin: center;
    }
    
    .feature-card:hover .card-background {
        opacity: 0.25;
        transform: scale(1.05);
    }
    
    /* Glass-morphism effect stats card */
    .stat-card {
        transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
        border: 1px solid rgba(255, 255, 255, 0.18);
        box-shadow: 0 8px 16px rgba(0,0,0,0.06);
        border-radius: 20px;
        overflow: hidden;
        backdrop-filter: blur(5px);
        background: rgba(255, 255, 255, 0.9);
    }
    
    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 25px rgba(0,0,0,0.1);
    }
    
    .stat-title {
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        color: #6c757d;
        margin-bottom: 5px;
        letter-spacing: 0.5px;
    }
    
    .stat-value {
        font-size: 32px;
        font-weight: 800;
        background: linear-gradient(45deg, #3a7bd5, #8b5cf6);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 0;
    }
    
    .stat-label {
        font-size: 13px;
        color: #6c757d;
        opacity: 0.85;
    }
    
    /* Enhanced icon styling */
    .feature-icon {
        width: 64px !important;
        height: 64px !important;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(8px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.12);
        transform: translateZ(0);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .feature-card:hover .feature-icon {
        transform: translateZ(0) scale(1.08);
    }
    
    .feature-icon i {
        font-size: 26px;
        color: white;
    }
    
    /* Redesigned welcome panel */
    .welcome-panel {
        background: linear-gradient(135deg, #f8f9ff, #ffffff);
        border-radius: 24px;
        margin-bottom: 24px;
        box-shadow: 0 15px 35px rgba(0,0,0,0.06);
        overflow: hidden;
        border: 1px solid rgba(255, 255, 255, 0.7);
        transition: all 0.4s ease;
        position: relative;
    }
    
    .welcome-panel:hover {
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        transform: translateY(-5px);
    }
    
    .welcome-panel::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 180px;
        height: 180px;
        background: linear-gradient(135deg, rgba(139, 92, 246, 0.1), rgba(139, 92, 246, 0.05));
        border-radius: 50%;
        z-index: 0;
        opacity: 0.8;
        transform: translate(40%, -40%);
    }
    
    .avatar-large {
        width: 76px;
        height: 76px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 20px;
        background: linear-gradient(135deg, #8b5cf6, #a78bfa);
        font-size: 32px;
        color: white;
        font-weight: 700;
        box-shadow: 0 10px 20px rgba(139, 92, 246, 0.3);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }
    
    .welcome-panel:hover .avatar-large {
        transform: scale(1.05) rotate(5deg);
    }
    
    /* Enhanced floating background elements */
    @keyframes floatSlow {
        0% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-15px) rotate(5deg); }
        100% { transform: translateY(0) rotate(0deg); }
    }
    
    @keyframes floatFast {
        0% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-10px) rotate(-3deg); }
        100% { transform: translateY(0) rotate(0deg); }
    }
    
    .bg-shape {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        z-index: -1;
    }
    
    .bg-shape-1 {
        top: -100px;
        right: 10%;
        width: 400px;
        height: 400px;
        background: linear-gradient(45deg, rgba(139, 92, 246, 0.08), rgba(139, 92, 246, 0.04));
        animation: floatSlow 15s ease-in-out infinite;
    }
    
    .bg-shape-2 {
        bottom: 10%;
        left: 5%;
        width: 350px;
        height: 350px;
        background: linear-gradient(45deg, rgba(255, 191, 0, 0.06), rgba(255, 191, 0, 0.03));
        animation: floatFast 12s ease-in-out infinite;
        animation-delay: 2s;
    }
    
    .bg-shape-3 {
        top: 30%;
        left: 30%;
        width: 250px;
        height: 250px;
        background: linear-gradient(45deg, rgba(8, 145, 178, 0.05), rgba(8, 145, 178, 0.02));
        animation: floatSlow 18s ease-in-out infinite;
        animation-delay: 4s;
    }
    
    /* Enhanced gradients for feature cards */
    .bg-gradient-purple {
        background: linear-gradient(45deg, #8b5cf6, #a78bfa) !important;
    }
    
    .bg-gradient-amber {
        background: linear-gradient(45deg, #d97706, #fbbf24) !important;
    }
    
    .bg-gradient-cyan {
        background: linear-gradient(45deg, #0891b2, #22d3ee) !important;
    }
    
    /* Modernized table styling */
    .modern-table {
        border-collapse: separate;
        border-spacing: 0;
        width: 100%;
    }
    
    .modern-table th {
        font-weight: 600;
        padding: 18px 20px;
        background-color: #f8f9fa;
        border-bottom: 1px solid #e9ecef;
        color: #495057;
        font-size: 13px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }
    
    .modern-table td {
        padding: 18px 20px;
        border-bottom: 1px solid #f1f1f1;
        vertical-align: middle;
    }
    
    .modern-table tr {
        transition: all 0.3s ease;
    }
    
    .modern-table tr:hover {
        background-color: #f8f9ff;
        transform: translateX(3px);
    }
    
    .table-card {
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: all 0.4s ease;
    }
    
    .table-card:hover {
        box-shadow: 0 15px 40px rgba(0,0,0,0.08);
        transform: translateY(-5px);
    }
    
    /* Active period badge */
    .active-period {
        background: linear-gradient(45deg, #3a7bd5, #8b5cf6);
        color: white;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
        display: inline-block;
        box-shadow: 0 5px 15px rgba(58, 123, 213, 0.2);
    }
    
    /* Mobile responsiveness improvements */
    @media (max-width: 991.98px) {
        .welcome-text {
            font-size: 28px;
        }
        
        .feature-card {
            margin-bottom: 20px;
        }
        
        .stat-card {
            margin-bottom: 15px;
        }
        
        .avatar-large {
            width: 60px;
            height: 60px;
            font-size: 24px;
        }
    }
    
    @media (max-width: 767.98px) {
        .welcome-text {
            font-size: 24px;
        }
        
        .table-responsive {
            border-radius: 16px;
            overflow: hidden;
        }
        
        .card-body {
            padding: 20px !important;
        }
        
        .welcome-panel::after {
            width: 120px;
            height: 120px;
        }
    }
    
    /* User item in table styling */
    .user-item {
        display: flex;
        align-items: center;
    }
    
    .user-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: linear-gradient(135deg, #8b5cf6, #a78bfa);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 14px;
        font-weight: 600;
        margin-right: 12px;
        flex-shrink: 0;
        box-shadow: 0 4px 8px rgba(139, 92, 246, 0.2);
    }
    
    .user-name {
        font-weight: 500;
        color: #495057;
        transition: color 0.3s ease;
    }
    
    tr:hover .user-name {
        color: #3a7bd5;
    }
    
    /* Badge styling */
    .badge-topic {
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        background-color: #f1f5fd;
        color: #3a7bd5;
        letter-spacing: 0.3px;
    }
    
    /* Empty state enhancement */
    .empty-state {
        padding: 60px 20px;
        text-align: center;
    }
    
    .empty-state-icon {
        font-size: 4rem;
        color: #e9ecef;
        margin-bottom: 20px;
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); opacity: 0.7; }
        50% { transform: scale(1.1); opacity: 0.9; }
        100% { transform: scale(1); opacity: 0.7; }
    }
    
    .empty-state-text {
        color: #adb5bd;
        font-size: 16px;
        font-weight: 500;
    }
    
    /* Breadcrumb styling */
    .breadcrumb {
        background: transparent;
        padding: 0;
    }
    
    .breadcrumb-item+.breadcrumb-item::before {
        content: "•";
        color: #adb5bd;
    }
    
    .breadcrumb-item a {
        color: #6c757d;
        font-weight: 500;
        transition: color 0.3s ease;
    }
    
    .breadcrumb-item a:hover {
        color: #3a7bd5;
        text-decoration: none;
    }
    
    .breadcrumb-item.active {
        color: #3a7bd5;
        font-weight: 600;
    }
</style>

@section('content')
<div class="dashboard-container">
    <!-- Enhanced animated background shapes -->
    <div class="bg-shape bg-shape-1"></div>
    <div class="bg-shape bg-shape-2"></div>
    <div class="bg-shape bg-shape-3"></div>

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
            <!-- Redesigned Welcome Panel -->
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
                    <div class="stat-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div style="width: 56px; height: 56px; background: linear-gradient(45deg, #8b5cf6, #a78bfa); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin-right: 15px; box-shadow: 0 8px 16px rgba(139, 92, 246, 0.2);">
                                    <i class="fas fa-user-graduate text-white fa-lg"></i>
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
                    <div class="stat-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div style="width: 56px; height: 56px; background: linear-gradient(45deg, #d97706, #fbbf24); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin-right: 15px; box-shadow: 0 8px 16px rgba(217, 119, 6, 0.2);">
                                    <i class="fas fa-file-alt text-white fa-lg"></i>
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
                    <div class="stat-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div style="width: 56px; height: 56px; background: linear-gradient(45deg, #0891b2, #22d3ee); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin-right: 15px; box-shadow: 0 8px 16px rgba(8, 145, 178, 0.2);">
                                    <i class="fas fa-medal text-white fa-lg"></i>
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
                    <div class="stat-card h-100">
                        <div class="card-body p-4">
                            <div class="d-flex align-items-start">
                                <div style="width: 56px; height: 56px; background: linear-gradient(45deg, #4f46e5, #818cf8); border-radius: 16px; display: flex; align-items: center; justify-content: center; margin-right: 15px; box-shadow: 0 8px 16px rgba(79, 70, 229, 0.2);">
                                    <i class="fas fa-chalkboard-teacher text-white fa-lg"></i>
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

            <!-- Referensi Table with enhanced styling -->
            <div class="card table-card">
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="fw-bold mb-0">Referensi Topik Tugas Akhir</h4>
                        <button class="btn btn-sm btn-light py-2 px-3 rounded-pill shadow-sm">
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
                                        <span class="badge-topic">{{ $referensi->bidang_minat }}</span>
                                    </td>
                                    <td>{{ $referensi->judul }}</td>
                                    <td>
                                        <div class="user-item">
                                            <div class="user-avatar">
                                                {{ strtoupper(substr($referensi->user->name, 0, 1)) }}
                                            </div>
                                            <span class="user-name">{{ $referensi->user->name }}</span>
                                        </div>
                                    </td>
                                </tr>
                                @empty 
                                <tr>
                                    <td colspan="4">
                                        <div class="empty-state">
                                            <i class="fas fa-folder-open empty-state-icon"></i>
                                            <p class="empty-state-text">Belum ada data referensi tugas akhir</p>
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
            // GSAP Timeline for sequenced animations
            const tl = gsap.timeline();
            
            // Initial loading animations
            tl.from(".welcome-text", {
                duration: 0.7,
                opacity: 0,
                y: -20,
                ease: "power3.out"
            })
            .from(".breadcrumb", {
                duration: 0.5,
                opacity: 0,
                x: 20,
                ease: "power2.out"
            }, "-=0.3")
            .from(".welcome-panel", {
                duration: 0.8,
                opacity: 0,
                y: 30,
                ease: "power3.out"
            }, "-=0.2")
            .from(".avatar-large", {
                duration: 0.6,
                opacity: 0,
                scale: 0.8,
                ease: "back.out(1.7)"
            }, "-=0.4")
            .from(".feature-card", {
                duration: 0.7,
                opacity: 0,
                y: 40,
                stagger: 0.15,
                ease: "power2.out"
            }, "-=0.2")
            .from(".stat-card", {
                duration: 0.6,
                opacity: 0,
                y: 30,
                stagger: 0.1,
                ease: "power2.out"
            }, "-=0.4")
            .from(".table-card", {
                duration: 0.7,
                opacity: 0,
                y: 40,
                ease: "power2.out"
            }, "-=0.3")
            .from("table tr", {
                duration: 0.4,
                opacity: 0,
                y: 15,
                stagger: 0.05,
                ease: "power1.out"
            }, "-=0.2");
            
            // Enhanced hover effects
            const featureCards = document.querySelectorAll('.feature-card');
            featureCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    gsap.to(this, {
                        scale: 1.03,
                        duration: 0.4,
                        ease: "power2.out"
                    });
                    gsap.to(this.querySelector('.card-background'), {
                        opacity: 0.25,
                        scale: 1.1,
                        duration: 0.5,
                        ease: "power2.out"
                    });
                    gsap.to(this.querySelector('.feature-icon'), {
                        y: -5,
                        scale: 1.1,
                        duration: 0.4,
                        ease: "back.out(1.7)"
                    });
                });
                
                card.addEventListener('mouseleave', function() {
                    gsap.to(this, {
                        scale: 1,
                        duration: 0.4,
                        ease: "power2.out"
                    });
                    gsap.to(this.querySelector('.card-background'), {
                        opacity: 0.15,
                        scale: 1,
                        duration: 0.5,
                        ease: "power2.out"
                    });
                    gsap.to(this.querySelector('.feature-icon'), {
                        y: 0,
                        scale: 1,
                        duration: 0.4,
                        ease: "back.out(1.7)"
                    });
                });
            });
            
            // Table row hover animation
            const tableRows = document.querySelectorAll('.modern-table tbody tr');
            tableRows.forEach(row => {
                row.addEventListener('mouseenter', function() {
                    gsap.to(this, {
                        backgroundColor: 'rgba(248, 249, 255, 1)',
                        x: 5,
                        duration: 0.3,
                        ease: "power1.out"
                    });
                    
                    // Brighten user avatar on hover
                    const avatar = this.querySelector('.user-avatar');
                    if (avatar) {
                        gsap.to(avatar, {
                            scale: 1.1,
                            boxShadow: '0 6px 12px rgba(139, 92, 246, 0.25)',
                            duration: 0.3,
                            ease: "power1.out"
                        });
                    }
                });
                
                row.addEventListener('mouseleave', function() {
                    gsap.to(this, {
                        backgroundColor: 'rgba(255, 255, 255, 0)',
                        x: 0,
                        duration: 0.3,
                        ease: "power1.out"
                    });
                    
                    // Reset user avatar on mouse leave
                    const avatar = this.querySelector('.user-avatar');
                    if (avatar) {
                        gsap.to(avatar, {
                            scale: 1,
                            boxShadow: '0 4px 8px rgba(139, 92, 246, 0.2)',
                            duration: 0.3,
                            ease: "power1.out"
                        });
                    }
                });
            });
            
            // Parallax effect for background shapes on mouse move
            const dashboardContainer = document.querySelector('.dashboard-container');
            const bgShapes = document.querySelectorAll('.bg-shape');
            
            if (dashboardContainer && bgShapes.length > 0) {
                dashboardContainer.addEventListener('mousemove', function(e) {
                    const x = e.clientX / window.innerWidth;
                    const y = e.clientY / window.innerHeight;
                    
                    bgShapes.forEach((shape, index) => {
                        const speed = (index + 1) * 10;
                        gsap.to(shape, {
                            x: (x - 0.5) * speed,
                            y: (y - 0.5) * speed,
                            duration: 1,
                            ease: "power1.out"
                        });
                    });
                });
            }
            
            // Initialize ScrollTrigger for elements that come into view
            if (typeof ScrollTrigger !== 'undefined') {
                gsap.utils.toArray('.feature-card, .stat-card, .table-card').forEach(card => {
                    ScrollTrigger.create({
                        trigger: card,
                        start: 'top 80%',
                        onEnter: () => {
                            gsap.to(card, {
                                y: 0,
                                opacity: 1,
                                duration: 0.6,
                                ease: "power2.out"
                            });
                        },
                        once: true
                    });
                });
            }
        }
    });
</script>
@endpush