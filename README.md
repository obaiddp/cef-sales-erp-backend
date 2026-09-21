# Sales ERP backend

## Models
- Roles
- Users

## Routes
GET  /api/users
POST /api/users
GET  /api/users/{user}
PUT  /api/users/{user}
DELETE /api/users/{user}

GET  /api/roles
POST /api/roles

GET  /api/permissions
POST /api/permissions


GET  /api/roles/{role}/permissions
POST /api/roles/{role}/permissions/{permission}
DELETE /api/roles/{role}/permissions/{permission}

## RBAC Overview
```
roles
    Admin
    Country-Manager
    Region-Manager
    Area-Manager

permissions
    Create Activity Entry
    Read Activity Entry
    Update Activity Entry
    Delete Activity Entry
```

```
Admin
 ├── Create Activity Entry
 ├── Read Activity Entry
 ├── Update Activity Entry
 └── Delete Activity Entry

Country-Manager
 └── Read Activity Entry

Region-Manager
 ├── Read Activity Entry
 └── Update Activity Entry

Area-Manager
 ├── Create Activity Entry
 └── Read Activity Entry
```