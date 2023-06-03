
export interface UserInfoType {
    user: UserType
    token: string
    role: RoleType
}

export interface UserType {
    id: number | null
    username: string
    firstname: string | null
    surname: string | null
    lastname: string | null
    email: string | null
    email_verified_at: string | null
    phone: string | null
    phone_verified_at: string | null
    created_at?: string
    updated_at?: string
}

export interface RoleType {
    id: number
    name: string
    slug: string
    created_at?: string
    updated_at?: string
    permissions: PermissionType[]
}

export interface PermissionType {
    id: number
    name: string
    slug: string
    created_at?: string
    updated_at?: string
    pivot?: Pivot
}

export interface Pivot {
    role_id: number
    permission_id: number
}
