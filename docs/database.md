1. users

    - id
    - name
    - email
    - ?email_verified_at
    - password
    - ?remember_token
    - created_at
    - updated_at

1. password_reset_tokens

    - email
    - token
    - ?created_at

1. sessions

    - id
    - ?user_id
    - ?ip_address
    - ?user_agent
    - payload
    - last_activity

1. cache

    - key
    - value
    - expiration

1. cache_locks

    - key
    - owner
    - expiration

1. jobs

    - queue
    - payload
    - attempts
    - reserved_at
    - available_at
    - created_at

1. job_batches

    - id
    - name
    - total_jobs
    - pending_jobs
    - failed_jobs
    - failed_jobs_ids
    - ?options
    - ?cancelled_at
    - created_at
    - ?finished_at

1. failed_jobs

    - uuid
    - connection
    - queue
    - payload
    - expiration
    - failed_at
