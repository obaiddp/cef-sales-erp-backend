# CEF365
## All in one package for CEF ICT Department, Managing Report logs and asset inspection forms and much more

- **Support Logs (log-report)** and **Asset Inspection** with a cross-department approval workflow
- RBAC

# Schema

```mermaid
erDiagram
  ROLES ||--o{ USERS : has
  ROLES ||--o{ ROLE_PERMISSIONS : grants
  PERMISSIONS ||--o{ ROLE_PERMISSIONS : included_in
  DEPARTMENTS ||--o{ USERS : members

  USERS ||--o{ SUPPORT_LOGS : created_by
  USERS |o--o{ SUPPORT_LOGS : assigned_to
  USERS |o--o{ SUPPORT_LOGS : requester
  USERS ||--o{ SUPPORT_LOG_ASSIGNMENTS : assigned_by
  USERS ||--o{ SUPPORT_LOG_ASSIGNMENTS : assigned_to

  USERS ||--o{ ASSET_INSPECTIONS : prepared_by
  USERS |o--o{ ASSET_INSPECTIONS : subject_user
  USERS |o--o{ ASSET_INSPECTIONS : approved_by
  USERS ||--o{ ASSET_INSPECTION_COMMENTS : writes
  USERS ||--o{ ASSET_INSPECTION_STATUS_LOGS : changed_by

  DEPARTMENTS ||--o{ SUPPORT_LOGS : raises
  DEPARTMENTS ||--o{ ASSET_INSPECTIONS : belongs_to
  ITEM_TYPES ||--o{ SUPPORT_LOGS : concerns
  ITEM_TYPES ||--o{ ASSET_INSPECTIONS : inspected_as

  SUPPORT_LOGS ||--o{ SUPPORT_LOG_ASSIGNMENTS : history
  SUPPORT_LOGS ||--o{ SUPPORT_LOG_ISSUE_TYPES : tagged
  ISSUE_TYPES ||--o{ SUPPORT_LOG_ISSUE_TYPES : classifies

  ASSET_INSPECTIONS ||--o{ ASSET_INSPECTION_COMMENTS : discussion
  ASSET_INSPECTIONS ||--o{ ASSET_INSPECTION_STATUS_LOGS : audit

  USERS {
    bigint id PK
    string name
    string email UK
    string password
    bigint role_id FK
    bigint department_id FK "NEW"
    string designation
  }
  SUPPORT_LOGS {
    bigint id PK
    string ticket_number UK
    string initiated_by "snapshot text"
    bigint requester_user_id FK "NEW nullable"
    bigint department_id FK
    bigint item_type_id FK
    enum status
  }
  ASSET_INSPECTIONS {
    bigint id PK
    bigint user_id FK "NEW nullable"
    string username "snapshot"
    string designation "snapshot"
    string email "snapshot"
    string cell "snapshot"
    string employee_status "RENAMED from status"
    enum workflow_status "NEW draft/submitted/under_review/returned/approved"
    timestamp submitted_at "NEW"
    bigint approved_by FK "NEW"
    timestamp approved_at "NEW"
    bigint prepared_by FK
    string admin_signature "optional image"
  }
  ASSET_INSPECTION_COMMENTS {
    bigint id PK
    bigint asset_inspection_id FK
    bigint user_id FK
    text body
    timestamp created_at
  }
  ASSET_INSPECTION_STATUS_LOGS {
    bigint id PK
    bigint asset_inspection_id FK
    string from_status
    string to_status
    bigint changed_by FK
    timestamp created_at
  }
```

