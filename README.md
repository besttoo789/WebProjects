office-management-system-frontend/
├── src/
│   ├── app/
│   │   ├── auth/                         # โมดูลการล็อกอิน
│   │   │   ├── login/                    # Component ล็อกอิน
│   │   │   │   ├── login.component.html  # ฟอร์มล็อกอิน
│   │   │   │   ├── login.component.scss  # สไตล์
│   │   │   │   └── login.component.ts    # Logic ล็อกอิน
│   │   │   ├── auth.service.ts           # Service จัดการ Token
│   │   │   ├── auth.guard.ts             # Guard ป้องกันเส้นทาง
│   │   │   └── auth.module.ts            # โมดูลรวม
│   │   ├── admin/                        # โมดูลสำหรับ Admin
│   │   │   ├── dashboard/                # Dashboard
│   │   │   │   ├── dashboard.component.html
│   │   │   │   ├── dashboard.component.scss
│   │   │   │   └── dashboard.component.ts
│   │   │   ├── user-management/          # จัดการบุคลากร
│   │   │   │   ├── user-management.component.html
│   │   │   │   ├── user-management.component.scss
│   │   │   │   └── user-management.component.ts
│   │   │   ├── department-management/    # จัดการหน่วยงาน
│   │   │   │   ├── department-management.component.html
│   │   │   │   ├── department-management.component.scss
│   │   │   │   └── department-management.component.ts
│   │   │   ├── unit-management/          # จัดการหน่วยนับ
│   │   │   │   ├── unit-management.component.html
│   │   │   │   ├── unit-management.component.scss
│   │   │   │   └── unit-management.component.ts
│   │   │   ├── item-management/          # จัดการวัสดุ/ครุภัณฑ์
│   │   │   │   ├── item-management.component.html
│   │   │   │   ├── item-management.component.scss
│   │   │   │   └── item-management.component.ts
│   │   │   ├── stock-management/         # จัดการสต๊อก
│   │   │   │   ├── stock-management.component.html
│   │   │   │   ├── stock-management.component.scss
│   │   │   │   └── stock-management.component.ts
│   │   │   ├── borrow-approval/          # อนุมัติการยืม
│   │   │   │   ├── borrow-approval.component.html
│   │   │   │   ├── borrow-approval.component.scss
│   │   │   │   └── borrow-approval.component.ts
│   │   │   ├── withdraw-approval/        # อนุมัติการเบิก
│   │   │   │   ├── withdraw-approval.component.html
│   │   │   │   ├── withdraw-approval.component.scss
│   │   │   │   └── withdraw-approval.component.ts
│   │   │   ├── report/                   # รายงาน
│   │   │   │   ├── report.component.html
│   │   │   │   ├── report.component.scss
│   │   │   │   └── report.component.ts
│   │   │   ├── admin-routing.module.ts   # เส้นทางของ Admin
│   │   │   └── admin.module.ts           # โมดูลรวม
│   │   ├── staff/                        # โมดูลสำหรับ Staff
│   │   │   ├── dashboard/                # Dashboard
│   │   │   │   ├── dashboard.component.html
│   │   │   │   ├── dashboard.component.scss
│   │   │   │   └── dashboard.component.ts
│   │   │   ├── profile/                  # แก้ไขโปรไฟล์
│   │   │   │   ├── profile.component.html
│   │   │   │   ├── profile.component.scss
│   │   │   │   └── profile.component.ts
│   │   │   ├── request-item/             # เบิก/ยืม
│   │   │   │   ├── request-item.component.html
│   │   │   │   ├── request-item.component.scss
│   │   │   │   └── request-item.component.ts
│   │   │   ├── request-history/          # ประวัติคำขอ
│   │   │   │   ├── request-history.component.html
│   │   │   │   ├── request-history.component.scss
│   │   │   │   └── request-history.component.ts
│   │   │   ├── staff-routing.module.ts   # เส้นทางของ Staff
│   │   │   └── staff.module.ts           # โมดูลรวม
│   │   ├── shared/                       # Components/Services ที่ใช้ร่วมกัน
│   │   │   ├── components/
│   │   │   │   ├── header/               # Header
│   │   │   │   │   ├── header.component.html
│   │   │   │   │   ├── header.component.scss
│   │   │   │   │   └── header.component.ts
│   │   │   │   └── footer/               # Footer
│   │   │   │       ├── footer.component.html
│   │   │   │       ├── footer.component.scss
│   │   │   │       └── footer.component.ts
│   │   │   ├── services/
│   │   │   │   ├── api.service.ts        # เรียก API
│   │   │   │   └── notification.service.ts # แจ้งเตือน
│   │   │   └── shared.module.ts          # โมดูลรวม
│   │   ├── app.component.html            # Root Template
│   │   ├── app.component.scss            # Root Style
│   │   ├── app.component.ts              # Root Logic
│   │   ├── app-routing.module.ts         # เส้นทางหลัก
│   │   └── app.module.ts                 # โมดูลหลัก
│   ├── assets/                           # รูปภาพ, ไฟล์ static
│   │   ├── images/                       # รูปภาพ
│   │   └── styles/                       # CSS/SCSS ทั่วไป
│   └── environments/                     # ค่าคงที่
│       ├── environment.ts                # Development
│       └── environment.prod.ts           # Production
├── angular.json                          # การตั้งค่า Angular
├── package.json                          # Dependencies
└── tsconfig.json                         # การตั้งค่า TypeScript


office-management-system-backend/
├── main.go                               # ไฟล์หลัก รันเซิร์ฟเวอร์
├── models/                               # โมเดลข้อมูล
│   ├── user.go                           # โมเดลบุคลากร
│   ├── department.go                     # โมเดลหน่วยงาน
│   ├── unit.go                           # โมเดลหน่วยนับ
│   ├── item.go                           # โมเดลวัสดุ/ครุภัณฑ์
│   └── request.go                        # โมเดลคำขอ (เบิก/ยืม)
├── handlers/                             # API Handlers
│   ├── auth.go                           # ล็อกอิน
│   ├── users.go                          # จัดการบุคลากร
│   ├── departments.go                    # จัดการหน่วยงาน
│   ├── units.go                          # จัดการหน่วยนับ
│   ├── items.go                          # จัดการวัสดุ/ครุภัณฑ์
│   ├── stock.go                          # จัดการสต๊อก
│   ├── borrow.go                         # จัดการยืม-คืน
│   ├── withdraw.go                       # จัดการเบิก-จ่าย
│   ├── dashboard.go                      # ข้อมูล Dashboard
│   └── reports.go                        # รายงาน
├── db/                                   # การเชื่อมต่อฐานข้อมูล
│   └── db.go                             # Config การเชื่อมต่อ
├── middleware/                           # Middleware
│   ├── auth.go                           # ตรวจสอบ JWT
│   └── role.go                           # ตรวจสอบ Role (Admin/Staff)
├── utils/                                # ฟังก์ชันช่วย
│   ├── export.go                         # Export รายงาน (Excel)
│   └── response.go                       # จัดการ Response
├── go.mod                                # Dependencies
└── go.sum                                # Checksum
